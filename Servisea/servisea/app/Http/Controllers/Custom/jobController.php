<?php

namespace App\Http\Controllers\custom;
//require_once 'vendor/autoload.php';
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\ArrayDataset;

class jobController extends Controller
{

    public function viewRequestJobPage(Request $request){

        $sessionUser= $request->session()->get('userDetails');
        if(isset($sessionUser)==null){
            return view("user.postJob");
        }else{
            return redirect('login_user');
        }
    }

    public function ai(){
                // Train the model with some sample data
                $samples = [
                    ['I had a great time at the park today'],
                    ['This movie was terrible, I want my money back'],
                    ['The weather is beautiful today'],
                    ['I hate this game, it sucks!'],
                    ['I love spending time with my family'],
                    ['I can\'t believe how stupid you are'],
                    ['I hate this game, it\'s so stupid!']
                ];

                $labels = ['clean', 'foul', 'clean', 'foul', 'clean', 'foul', 'foul'];

                $classifier = new NaiveBayes();
                $classifier->train($samples, $labels);

                $text = 'I hate this game, it\'s so stupid!';

                // Use the model to classify the input text
                $result = $classifier->predict([$text]);
                // Return the classification result
                return response()->json([
                    'text' => $text,
                    'classification' => $result[0]
                ]);

            // Training data - these are sample texts with known foul language
            // $trainingData = [
            //     ['text' => 'I hate this game, it sucks!', 'label' => 'foul'],
            //     ['text' => 'Fuck with you', 'label' => 'foul'],
            //     ['text' => 'This movie was fucking terrible, I want my money back', 'label' => 'foul'],
            //     ['text' => 'I can\'t believe how stupid you are', 'label' => 'foul'],
            //     ['text' => 'I had a great time at the park today', 'label' => 'clean'],
            //     ['text' => 'The weather is beautiful today', 'label' => 'clean'],
            //     ['text' => 'I love spending time with my family', 'label' => 'clean'],
            // ];

            // // Create a new Naive Bayes classifier
            // $classifier = new \Phpml\Classification\NaiveBayes();

            // // Split the training data into features and labels
            // $features = [];
            // $labels = [];

            // foreach ($trainingData as $data) {
            //     $features[] = explode(' ', $data['text']);
            //     $labels[] = $data['label'];
            // }

            // // Train the classifier using the features and labels
            // $classifier->train($features, $labels);

            // // Test the classifier using a new text string
            // $textToTest = 'I fuck with you ';
            // $prediction = $classifier->predict(explode(' ',$textToTest));

            // // Output the prediction
            // if ($prediction == 'foul') {
            //     echo 'The text contains foul language.';
            // } else {
            //     echo 'The text does not contain foul language.';
            // }
            // dd();
    }





}
