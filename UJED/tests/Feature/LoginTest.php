<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        //Consultar url de login
        $response1 = $this->get('/login');
        //Revisar status de consulta
        $response1->assertStatus(200);
        //Revisar que renderice el formulario
        $response1->assertSee('Login');
        //Agregar credenciales para login
        
        //Crear usuarios para test
            //$user = new \App\Models\User;
            //$user->name = 'Ejemplo';
            //$user->email = 'ejemplo@ejemplo.com';
            //$user->password = \Hash::make('ejemplo123');
            //$user->role_id = 1;
            //$user->save();

        $credenciales = [
            'email' => 'ejemplo@ejemplo.com',
            'password' => 'ejemplo123'
        ];
        //Realizar petición post para login
        $response2 = $this->post('/login', $credenciales);
        //Revisar si se hace una redirección a home
        $response2->assertRedirect('/home');
        //Revisar credenciales
        $this->assertCredentials($credenciales);
    }

    public function test_logout()
    {
        //Crear usuarios para test
        //$user = new \App\Models\User;
        //$user->name = 'Ejemplo';
        //$user->email = 'ejemplo@ejemplo.com';
        //$user->password = \Hash::make('ejemplo123');
        //$user->role_id = 1;
        //$user->save();

        $credenciales = [
            'email' => 'ejemplo@ejemplo.com',
            'password' => 'ejemplo123'
        ];
        //Realizar petición post para login
        $response2 = $this->post('/login', $credenciales);

        //Solicitar pantalla de home
        $response = $this->get('home');
        //Revisar status que sea igual a 200
        $response->assertStatus(200);
        //Revisar que se visualice un tag/text dashboard
        $response->assertSee('Dashboard');

        //Crear petición post para cerrar sesión
        $response1 = $this->post('logout');
        //Revisar la redirección a inicio
        $response1->assertRedirect('/');

    }
}
