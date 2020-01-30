由于使用laravel6.x不兼容 所以此项目由 [Brotzka/laravel-dotenv-editor](https://github.com/Brotzka/laravel-dotenv-editor) 修改并完善功能,在此感谢原项目作者

# Edit your Laravel .env file

This package offers you the possibility to edit your .env dynamically through a controller or model. 

The current version (2.x) ships with a graphical user interface based on VueJS to offer you a very simple implementation of all features.

List of available functions:
- check, if a given key exists
- get the value of a key
- get the complete content of your .env
- get the content as JSON
- change existing values
- add new key-value-pairs
- delete existing key-value-pairs
- create/restore/delete backups
- list all backups
- get the content of a backup
- enable auto-backups
- check, if auto-backups are enabled or not
- get and set a backup-path


Here are some images showing the gui which ships with the current version:


## Installation

### Via composer require

Install the package via the composer require command:

    composer require cranux/laravel-dotenv-editor



### Add the package manually

Add the following line to your composer.json require section:

    "require": {
        //other packages
        "cranux/laravel-dotenv-editor": "^1.*"
    }

Then run the composer update command:

    composer update

### After Installation

Add the following line to your `config/app.php` providers:

    Cranux\DotenvEditor\DotenvEditorServiceProvider::class,

Add the following line to your `config/app.php` aliases:

    'DotenvEditor' => Cranux\DotenvEditor\DotenvEditorFacade::class,

Finally you have to publish the config file and view via:

    php artisan vendor:publish --provider="Cranux\DotenvEditor\DotenvEditorServiceProvider"

After an Update, maybe you have to force publish:

    php artisan vendor:publish --provider="Cranux\DotenvEditor\DotenvEditorServiceProvider" --force

Be careful, this will overwrite all your published files! It's always better to delete the ```config/dotenveditor.php```file manually and then run the ```php artisan vendor:publish``` command than to run the force version.

Now you can edit the config file and put in your values.

## Config

Open the config/dotenveditor.php and fill it up with your values.

**Note:** I had an issue where I had to switch the web-middleware between ```middleware``` and ```middlewareGroups```. In Laravel 5.2, put the web-middleware in the ```middleware``` array. For Laravel 5.1 put it in the ```middlewareGroups``` array.

The path to your .env should not be changed. 

## Deactivate GUI

If you don't want to use the graphical interface, you could deactivate it in the config. 

## Additional middleware

If you want to add more middlewares to the used routes, you could put them in the arrays.

## Examples

The following example shows an controller with a method, in which we change some values from the .env.
Make sure, the entries you want to change, really exist in your .env.

    namespace App\Http\Controllers;

    use Cranux\DotenvEditor\DotenvEditor;
    use Cranux\DotenvEditor\DotenvEditorFacade;

    class EnvController extends Controller
    {
        public function test(){
            $env = new DotenvEditor();

            $env->changeEnv([
                'TEST_ENTRY1'   => 'one_new_value',
                'TEST_ENTRY2'   => $anotherValue,
            ]);
            // 使用门面
            DotenvEditorFacade::changeEnv([
                'TEST_ENTRY1'   => 'one_new_value',
                'TEST_ENTRY2'   => $anotherValue,
            ]);
        }
    }

For more exmaples visit the Wiki.

感谢  [Brotzka/laravel-dotenv-editor](https://github.com/Brotzka/laravel-dotenv-editor)
