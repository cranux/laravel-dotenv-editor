<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 12.05.16
 * Time: 07:20
 */

namespace Cranux\DotenvEditor;

use Illuminate\Support\Facades\Facade;

class DotenvEditorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cranux-dotenveditor';
    }
}
