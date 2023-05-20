<?php

namespace App\Http\Controllers\custom;
//require_once 'vendor/autoload.php';
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job_Request;
use Illuminate\Http\Request;
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\ArrayDataset;
use App\Helpers\AppHelper;

class jobController extends Controller
{

    public function viewRequestJobPage(Request $request){

        $sessionUser= $request->session()->get('user');
        if(isset($sessionUser)){
            $category = Category::all();
            $request->session()->put('categoryList',$category);
            return view("user.postJob");
        }else{
            return redirect('login_user');
        }
    }

    public function viewRequestJobPageB(Request $request){

        $sessionUser= $request->session()->get('user');
        if(isset($sessionUser)){ //add job details
            return view("user.postJobB");
        }else{
            return redirect('login_user');
        }
    }

    public function CreateJob(Request $request){

        $session= $request->session()->get('user');

        #validation
        $jobInput = $request->validate([
            'JR_TITLE'        => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'JR_DESCRIPTION'  => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'CATEGORY_ID'     => 'required|integer|regex:/^[0-9]+$/',
            'JR_ATTACHMENT'   => 'nullable|mimes:pdf,docx,ppt,word,pptx',
            'JR_REMUNERATION' => 'required|integer|regex:/^[0-9]+$/',
            'JR_DELIVERYDATE' => 'required|after_or_equal:'.now()->toDateString(),
       ]);

       Job_Request::create([
        'CATEGORY_ID'     => $jobInput['CATEGORY_ID'],
        'POSTED_BY_USER'  => $session['USER_ID'],
        'JR_TITLE'        => $jobInput['JR_TITLE'],
        'JR_REMUNERATION' => $jobInput['JR_REMUNERATION'],
        'JR_STATUS'       => 'PENDING',
        'JR_DELIVERYDATE' => $jobInput['JR_DELIVERYDATE'],
        'JR_DATEPOSTED'   => now(),

        ]);

        return Job_Request::where('POSTED_BY_USER', $session['USER_ID'])->latest()->first();

        if($request->hasFile($jobInput['JR_ATTACHMENT'])){
            $imageName = $request->file($jobInput['JR_ATTACHMENT'])->getClientOriginalName();
            $request->file($jobInput['JR_ATTACHMENT'])->storeAs('public/images/',$imageName);

            Job_Request::where('JR_ID',Job_Request::where('POSTED_BY_USER', $session['USER_ID'])->latest()->first())
                ->update([
                'JR_REMUNERATION' => $jobInput['JR_REMUNERATION']
            ]);

        }

        if(AppHelper::instance()->ai($jobInput['JR_DESCRIPTION'])=='foul'){

            Job_Request::where('JR_ID',Job_Request::where('POSTED_BY_USER', $session['USER_ID'])->latest()->first())
                ->update([
                'JR_DESCRIPTION' => $jobInput['JR_DESCRIPTION'],
                'JR_STATUS'       => 'DRAFT',
            ]);

        }else{
            Job_Request::where('JR_ID',Job_Request::where('POSTED_BY_USER', $session['USER_ID'])->latest()->first())
                ->update([
                'JR_DESCRIPTION' => $jobInput['JR_DESCRIPTION'],
                'JR_STATUS'       => 'CONFIRMED',
            ]);
        }




    }

    public function ai($text){
                // Train the model with some sample data
                $samples = [
                    ['I had a great time at the park today'],
                    ['This movie was terrible, I want my money back'],
                    ['The weather is beautiful today'],
                    ['I hate this game, it sucks!'],
                    ['I love spending time with my family'],
                    ['I can\'t believe how stupid you are'],
                    ['I hate this game, it\'s so stupid!'],
                    ['I love spending time with my family'],
                ];

                $labels = ['clean', 'foul', 'clean', 'foul', 'clean', 'foul'];

                $classifier = new NaiveBayes();
                $classifier->train($samples, $labels);

                // Use the model to classify the input text
                $result = $classifier->predict([$text]);
                return $result;
                // Return the classification result
                /* return response()->json([
                    'text' => $text,
                    'classification' => $result[0]
                ]); */

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
