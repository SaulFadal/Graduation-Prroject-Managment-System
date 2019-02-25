<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\File;
use App\Group;
use App\Student;
use App\Supervisor;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;



use Auth;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Checking if loggd in user is a student
        if(Auth::user()->user_role == 5){
        $CurrentUserGroup = Student::where('id', Auth::user()->id)->value('group_id');
            
        //Checking wether the group_id is null or not to handle the exception
        if($CurrentUserGroup != NULL){

            // $CurrentUserGroup = Student::find(Auth::user()->id)->Group->id;
            
            // return $CurrentUserGroup;
            // $files = File::where('access', $CurrentUserGroup)->get();
            $files = File::where('file_path','like', '%'.$CurrentUserGroup.'/%')->get();
            
            $filesGPC =File::where('access', 0)->get();
            // return $files;
    
            return view ('PublicFiles', compact('files','filesGPC', 'CurrentUserGroup'));

        }
        else{
            
            return redirect ('/')->with('WarningMessage', 'Can not view files ! You do not belong to a group');
        }


    } else if(Auth::user()->user_role == 3){
        //Checking if loggd in user is a supervisor
        $CurrentUserGroup = Supervisor::where('id', Auth::user()->id)->value('group_id');

        if($CurrentUserGroup != NULL){
            
            // return $files GPC file;
            $files = File::where('access', $CurrentUserGroup)->get();
            // return $CurrentUserGroup;
            $filesGPC = File::where('access', 0)->get();
    
            return view ('PublicFiles', compact('files', 'filesGPC', 'CurrentUserGroup'));

        }
        else{
            
            return redirect ('/')->with('WarningMessage', 'Can not view files ! You do not belong to a group');
        }

    }

    else if (Auth::user()->user_role == 2){

        //Show files that students submit.

    }
    
   

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $filesGPC =File::where('access', 0)->get();

        return view ('UploadFile', compact('filesGPC'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        if(Auth::user()->user_role == 5 || Auth::user()->user_role == 3){

             //Taking only the file and dicarding other information.
    $CurrFile = $request->file('file');    
    //Only for students
    $file = new File();
    $file->name = $CurrFile->getClientOriginalName();
    $file->file_path=  $CurrFile->storeAs(Student::find(Auth::user()->id)->Group->id, $CurrFile->getClientOriginalName());
    $file->access = Student::find(Auth::user()->id)->Group->id;
    $file->user_id = Auth::user()->id;

    $file->save();



    return redirect ('files')->with('SuccessMessage', 'Your file was uploaded');

        }

        if(Auth::user()->user_role == 2){

            if($request->has('file')){

                $CurrFile = $request->file('file');    
    //Only for students
    $file = new File();
    $file->name = $CurrFile->getClientOriginalName();
    $file->file_path=  $CurrFile->storeAs('PublicGPC', $CurrFile->getClientOriginalName());
    $file->access = 0;
    $file->user_id = Auth::user()->id;

    $file->save();

    return redirect('UploadFile')->with('SuccessMessage', 'File Uploaded successfully');

            }else{
                return redirect('UploadFile')->with('ErrorMessage', 'You have to choose a file !');
            }


    

        }

       



    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download(Request $request)
    {
        if($request->group_id == 0){

            return response()->download( public_path('publicGPC').'/'.$request->name);
        }
        else{

        
        return response()->download( public_path($request->group_id).'/'.$request->name);
    }
    }

    public function SubmitedFilesView()
    {

        if(Auth::user()->user_role == 5){

        

        $SubmitFiles = File::where('id',1)->get();

        $CurrentUserGroup = $CurrentUserGroup = Student::find(Auth::user()->id)->Group->id;
        $SubmittedFinalReport = File::where('file_path','like','%FinalReport%')->where('access', $CurrentUserGroup)->get();
        $SubmittedMidtermReport = File::where('file_path','like','%MidtermReport%')->where('access', $CurrentUserGroup)->get();
        $SubmittedPoster = File::where('file_path','like','%Poster%')->where('access', $CurrentUserGroup)->get();
        $SubmittedSimCheck = File::where('file_path','like','%SimCheck%')->where('access', $CurrentUserGroup)->get();
        // return $SubmittedFinalReport;
        
        // return $SubmittedFinalReport;
        return view ('SubmitFiles', compact('SubmitFiles', 'SubmittedFinalReport','SubmittedMidtermReport','SubmittedPoster','SubmittedSimCheck'));

    }


    }

    public function SubmitFinalReport(Request $request)
    {
        if(Auth::user()->user_role == 5){
            $CurrentUserGroup = Student::find(Auth::user()->id)->Group->id;
            $CurrFile = $request->file('file');    
    //Only for students

            $file = new File();
            $file->name = $CurrFile->getClientOriginalName();
            $file->file_path=  $CurrFile->storeAs('FinalReport', $CurrentUserGroup."_".$CurrFile->getClientOriginalName());
            $file->access = $CurrentUserGroup;
            $file->user_id = Auth::user()->id;

            $file->save();

            return redirect('/Submit')->with('SuccessMessage','Final report submitted successfully');
     

    }

   
    }

    public function SubmitMidtermReport(Request $request)
    {


        if(Auth::user()->user_role == 5){
            $CurrentUserGroup = Student::find(Auth::user()->id)->Group->id;
            $CurrFile = $request->file('file');    
    //Only for students

            $file = new File();
            $file->name = $CurrFile->getClientOriginalName();
            $file->file_path=  $CurrFile->storeAs('MidtermReport', $CurrentUserGroup."_".$CurrFile->getClientOriginalName());
            $file->access = $CurrentUserGroup;
            $file->user_id = Auth::user()->id;

            $file->save();

            return redirect('/Submit')->with('SuccessMessage','Midterm report submitted successfully');
     

    }
        
    }


    public function SubmitPoster(Request $request)
    {


        if(Auth::user()->user_role == 5){
            $CurrentUserGroup = Student::find(Auth::user()->id)->Group->id;
            $CurrFile = $request->file('file');    
    //Only for students

            $file = new File();
            $file->name = $CurrFile->getClientOriginalName();
            $file->file_path=  $CurrFile->storeAs('Poster', $CurrentUserGroup."_".$CurrFile->getClientOriginalName());
            $file->access = $CurrentUserGroup;
            $file->user_id = Auth::user()->id;

            $file->save();

            return redirect('/Submit')->with('SuccessMessage','Poster report submitted successfully');
     

    }
        
    }

    public function SubmitSimCheck(Request $request)
    {


        if(Auth::user()->user_role == 5){
            $CurrentUserGroup = Student::find(Auth::user()->id)->Group->id;
            $CurrFile = $request->file('file');    
    //Only for students

            $file = new File();
            $file->name = $CurrFile->getClientOriginalName();
            $file->file_path=  $CurrFile->storeAs('SimCheck', $CurrentUserGroup."_".$CurrFile->getClientOriginalName());
            $file->access = $CurrentUserGroup;
            $file->user_id = Auth::user()->id;

            $file->save();

            return redirect('/Submit')->with('SuccessMessage','Similarity Check report submitted successfully');
     

    }
        
    }

    public function ShowGroups()
    {
        //Getting all groups information to be displayed to examinar
        $Groups = Group::all();
        // return $Groups;
        return view('GroupsTable', compact('Groups'));
    }

    public function ShowGroupfiles(Request $request)
    {
        // return $request->group_id;
        $Group_id = $request->group_id;
        //Retriving the selected group's files (Final report, Midterm report, Similarity check, and Poster)
       $GroupFiles = File::where('file_path', 'like', '%FinalReport/'.$request->group_id.'%')->
       orWhere('file_path', 'like', '%MidtermReport/'.$request->group_id.'%')->orwhere('file_path', 'like', '%Poster/'.$request->group_id.'%')->
       orwhere('file_path', 'like', '%SimCheck/'.$request->group_id.'%')->get();
    
       return view('ShowGroupFile', compact('GroupFiles','Group_id'));
    }

    public function Examinardownload(Request $request)
    {
        // return $request->file_path;
        // return response()->download( $request->file_path);
        return response()->download( public_path($request->file_path));
    }

    public function ShowExaminar()
    {

        $ExaminarFiles = File::where('file_path','like','%FinalResult%')->get();
        return view('ExaminarUpload', compact('ExaminarFiles'));
    }

    public function StoreExaminarUpload(Request $request)
    {

        
            $CurrFile = $request->file('file');    
    

            $file = new File();
            $file->name = $CurrFile->getClientOriginalName();
            $file->file_path=  $CurrFile->storeAs('FinalResult', $CurrFile->getClientOriginalName());
            $file->access = 4;
            $file->user_id = Auth::user()->id;

            $file->save();

            return redirect('/Examinar/Marks')->with('SuccessMessage','Rsults are uploaded');
        
    }

    public function Examinardelete(Request $request)
    {
        // return $request->id;
        File::where('id', $request->id)->delete();
        // File::delete($request->id);
        // $apppath= app_path();
        // return public_path($request->file_path);
        unlink(public_path($request->file_path));

        return redirect ('/Examinar/Marks')->with('SuccessMessage', 'Results file deleted successfully');

    }

    public function Delete(Request $request)
    {

        
        unlink(public_path($request->file_path));
        File::where('id', $request->id)->delete();
        return redirect('files')->with('SuccessMessage', 'Your file was deleted');
    }

    public function GPCdelete  (Request $request)
    {
        unlink(public_path($request->file_path));
        File::where('id', $request->id)->delete();
        return redirect('UploadFile')->with('SuccessMessage', 'Your file was deleted');
    }
}
