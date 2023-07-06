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



}
