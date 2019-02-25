<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
Route::get('/chat', 'HomeController@chat')->name('home');
//Chat routes are above

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::post('/CreateGroup/Approval', 'CreateGroupController@Approve');
Route::post('/Proposals/FinalApproval', 'ProposalsController@FinalApprove')->middleware('auth');
Route::post('/CreateGroup/Reject', 'CreateGroupController@Reject')->middleware('auth');
Route::resource('proposals', 'ProposalsController')->middleware('auth');
Auth::routes();
Route::get('auth/logout', 'Auth\AuthController@logout');
Route::get('/proposals/details', 'HomeController@details')->name('home');
Route::get('/profile', 'HomeController@userProfile');
Route::get('/ProposeIdea', 'ProposalsController@create');
Route::resource('files', 'FilesController')->middleware('auth');
Route::post('DownloadFile', 'FilesController@download')->middleware('auth');
Route::post('Evaluate/Download', 'FilesController@Examinardownload')->middleware('auth');
Route::get('/UploadFile', 'FilesController@create')->middleware('auth');
Route::post('/UploadFile_delete', 'FilesController@GPCdelete')->middleware('auth');
Route::post('/Task_done', 'TasksController@Done')->middleware('auth');
Route::post('/Task_undone', 'TasksController@unDone')->middleware('auth');
Route::get('/Submit', 'FilesController@SubmitedFilesView')->middleware('auth');
Route::post('/SubmitFinalReport', 'FilesController@SubmitFinalReport')->middleware('auth');
Route::post('/SubmitMidtermReport', 'FilesController@SubmitMidtermReport')->middleware('auth');
Route::post('/SubmitPoster', 'FilesController@SubmitPoster')->middleware('auth');
Route::post('/SubmitSimCheck', 'FilesController@SubmitSimCheck')->middleware('auth');
Route::post('/ViewProposalChosen', 'ProposalsController@ViewChosenProposal');
Route::get('/Evaluate', 'FilesController@ShowGroups');
Route::get('/Examinar/Marks', 'FilesController@ShowExaminar');
Route::post('/Examinar/Marks/Upload', 'FilesController@StoreExaminarUpload');
Route::post('/Examinar/Marks/Delete', 'FilesController@Examinardelete');
Route::post('/files_Delete', 'FilesController@Delete');
Route::post('/Evaluate', 'FilesController@ShowGroupFiles');
// Route::post('/Evaluate/', 'FilesController@ShowGroupfiles');
Route::get('/Test', 'HomeController@x')->middleware('auth');
Route::get('/Task_status', 'TasksController@Check')->middleware('auth');
Route::post('/Add_a_task', 'TasksController@add')->middleware('auth');
Route::resource('CreateGroup', 'CreateGroupController')->middleware('auth');
Route::resource('event', 'EventController')->middleware('auth');
//App routes above