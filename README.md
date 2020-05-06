<h1>Welcome to Panda Studios Env Generator</h1>

<p>Panda Studios Env Generator or <b>PSEnvGen</b> for short is a laravel vendor to create easy and robust work enviroment for your laravel application</p>

<h3>Steps to download PSEnvGen :</h3>

<ol>
    <li>First run the following command <code style="color:red;">composer require panda-studios/ps-env</code></li>
    <li>Second download this directory and place it in app>Console path <a href="https://drive.google.com/open?id=1u70XPQVsoOda3ItB6Ciw6n7pn_634aw8">click here to download</a></li>
    <li>Third download the package via composer <code style="color:red;">composer require panda-studios/ps-env</code></li>
    <li>Finally run the following artisan command <code style="color:red;">php artisan ps-env:create</code></li>
    <li>It will generate the following directories & files</li>
    <ul>
        <li>includes directory</li>
        <ul>
            <li>assets directory</li>
            <ul>
                <li>script directory</li>
                <ul>
                    <li>index blade file</li>
                </ul>
                <li>style directory</li>
                <ul>
                    <li>index blade file</li>
                </ul>
                <li>script blade file</li>
                <li>style blade file</li>
            </ul>
        </ul>
        <li>layouts directory</li>
        <ul>
            <li>app blade file</li>
        </ul>
        <li>index blade file</li>
    </ul>
</ol>

<p>To see result go to routes>web.php and write the following code :</p>
<pre>
    Route::get('/', 'PagesController@index');
</pre>