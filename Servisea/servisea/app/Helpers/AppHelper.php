<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Phpml\Classification\NaiveBayes;
use Phpml\Tokenization\WhitespaceTokenizer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
Use Appwrite\ClamAV\ClamAV;
use Illuminate\Http\UploadedFile;

class AppHelper
{
      public function bladeHelper($someValue)
      {
             return "increment $someValue";
      }
     public static function instance()
     {
         return new AppHelper();
     }

     public function ai($text){
        // Train the model with some sample data
        $samples = [
            ['I had a great time at the park today'],
            ['This movie was terrible, I want my money back'],
            ['The weather is beautiful today'],
            ['I hate this game, it sucks!'],
            ['I love spending time with my family'],
            ['I can\'t believe how stupid you are']
        ];

        $labels = ['clean', 'foul', 'clean', 'foul', 'clean', 'foul'];

        $classifier = new NaiveBayes();
        $classifier->train($samples, $labels);

        // Use the model to classify the input text
        $result = $classifier->predict([$text]);
        return $result;
    }

    public function predict_Text($text){
        // Read training data from a text file
        $trainingDataFile = 'training_data.txt';
        $trainingData = file($trainingDataFile, FILE_IGNORE_NEW_LINES);

        // Read training labels from a text file
        $trainingLabelsFile = 'training_labels.txt';
        $trainingLabels = file($trainingLabelsFile, FILE_IGNORE_NEW_LINES);

        // Create a Naive Bayes classifier
        $classifier = new NaiveBayes();

        // Tokenize and vectorize the training data
        $tokenizer = new WhitespaceTokenizer();
        $vectorizer = new TokenCountVectorizer($tokenizer);
        $vectorizer->fit($trainingData);

        $vectorizedTrainingData = $vectorizer->transform($trainingData);

        // Train the classifier
        $classifier->train($vectorizedTrainingData, $trainingLabels);

        // Code snippet to classify
        $codeSnippet = 'Some Laravel code here';

        // Tokenize and vectorize the code snippet
        $tokenizedSnippet = $tokenizer->tokenize($codeSnippet);
        $vectorizedSnippet = $vectorizer->transform([$tokenizedSnippet]);

        // Predict the label for the code snippet
        $prediction = $classifier->predict($vectorizedSnippet[0]);

        if ($prediction === 'foul') {
            // Take appropriate action for foul text
            // e.g., display an error message or reject the code
            echo 'Foul text detected!';
        } else {
            // Process the clean code snippet
            echo 'Code is clean!';
        }
    }


    public function uploadFile(Request $request)
    {

        $path = $file->getRealPath();

        if (ClamAV::scanFile($path)) {
            // Virus detected
            return true;
        }

        $file = $request->file('file');

        if (checkForViruses($file)) {
            // Virus detected, take appropriate action
            return response()->json(['message' => 'Virus detected in the file.']);
        }

        // File is clean, continue processing
        $file->store('uploads');

        return response()->json(['message' => 'File uploaded successfully.']);
    }



}
