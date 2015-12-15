<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Symfony\Component\Process\Process;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    $users = collect([
        ['name' => '黃小保'],
        ['name' => '許小誠'],
        ['name' => '葉大雄'],
    ]);
//    dd($users);
    return view('pdf-templates.certificate', compact('users'));
});

Route::get('export', function () {
    $users = collect([
        ['name' => '黃小保'],
        ['name' => '許小誠'],
        ['name' => '葉大雄'],
    ]);

    $view = view('pdf-templates.certificate', compact('users'));

    return PDF::createFromView($view, 'pdf-demo.pdf');
});

Route::get('screenshot', function (\Illuminate\Http\Request $request) {
    $args = [
        base_path('vendor/danielboendergaard/phantom-pdf/bin/phantomjs'),
        public_path('rasterize.js')
    ];
    
    $args[] = $request->get('url') ? : 'http://www.google.com';
    $args[] = $output = $request->get('output') ? : 'screenshot.jpg';

    if ($request->get('paperformat')) {
        $args[] = $request->get('paperformat');
    }

    if ($request->get('zoom')) {
        $args[] = $request->get('zoom');
    }

    $command = implode(' ', $args);

//    dd($command, public_path());
    $process = new Process($command, public_path('screenshots'));
    $process->setTimeout(30);
    $process->run();
    
    if ($errorOutput = $process->getErrorOutput()) {
        throw new RuntimeException('PhantomJS: ' . $errorOutput);
    }

    //rename(storage_path($output), public_path('screenshots/' . $output));

    echo '<img src="' . asset('screenshots/' . $output) . '">';
});
