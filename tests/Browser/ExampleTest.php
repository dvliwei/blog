<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('laravel');
        });

    }


    public function testHomeExample(){
        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                ->visit('/home')
                ->assertSee('EVVMA');
        });
    }

    public function testApiContact(){
        $this->browse(function(Browser $browser){
            $browser->visit('api/contact')
                ->assertSee('success');
        });
    }

}
