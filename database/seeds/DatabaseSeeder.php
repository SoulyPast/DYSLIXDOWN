<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Nivell;
use App\Tipus;
// importa la comnda para crer movies php artisan migrate:refresh --seed.
class DatabaseSeeder extends Seeder
{

    public function run()
    {
        self::seedRoles();
        $this->command->info('Tabla roles inicializada con datos!');

        self::seedUsers();
        $this->command->info('Tabla usuarios inicializada con datos!');

        self::seedNivells();
        $this->command->info('Tabla nivells inicializada con datos!');

        self::seedTipus();
        $this->command->info('Tabla tipus inicializada con datos!');

	}


	private $arrayUsers= array(
		array(
			'name' => 'soulaimane',
			'email' => 'mssoulaimane@gmail.com',
            'password' => 'soulaimane',
            'escola' => 'Anicet de Pagès i de Puigs',
            'user' => 'professor'
		),
		array(
			'name' => 'alumne',
			'email' => 'alumne@gmail.com',
            'password' =>'alumneee',
            'escola' => 'Anicet de Pagès i de Puig',
            'user' => 'alumne'
		));



		private function seedUsers(){
            DB::table('users')->delete();
            $role_prof = Role::where('name','professor')->first();
            $role_alumne = Role::where('name','alumne')->first();
			foreach( $this->arrayUsers as $user ) {
				$p = new User;
				$p->name = $user['name'];
				$p->email = $user['email'];
                $p->password = bcrypt($user['password']);
                $p->escola = $user['escola'];
                $p->save();
                if( $user['user']=='professor'){
                    $p->roles()->attach($role_prof);
                }
                else {
                    $p->roles()->attach($role_alumne);
                };
            }}

            private $arrayRoles= array(
                array(
                    'name' => 'professor',
                    'description' => 'mssoulaimane@gmail.com'
                ),
                array(
                    'name' => 'alumne',
                    'description' => 'alumne@gmail.com',
                ));


            	private function seedRoles(){
                    DB::table('roles')->delete();
                    foreach( $this->arrayRoles as $role ) {
                        $r = new Role;
                        $r->name = $role['name'];
                        $r->description = $role['description'];
                        $r->save();
                    }}


                    private $arrayNivells= array(
                        array(
                            'nom_nivell' => 'Fàcil',
                            'descripcio_nivell' => 'cada exercici només tendra 4 opcions'
                        ),
                        array(
                            'nom_nivell' => 'Normal',
                            'descripcio_nivell' => 'cada exercici només tendra 6 opcions',
                        ),
                        array(
                            'nom_nivell' => 'Difícil',
                            'descripcio_nivell' => 'cada exercici només tendra 8 opcions',
                        ));

                        private function seedNivells(){
                            DB::table('nivells')->delete();
                            foreach( $this->arrayNivells as $nivell ) {
                                $r = new Nivell;
                                $r->nom_nivell = $nivell['nom_nivell'];
                                $r->descripcio_nivell = $nivell['descripcio_nivell'];
                                $r->save();
                            }}

                            private $arrayTipus= array(
                                array(
                                    'nom_tipus' => 'Formant paraules',
                                    'descripcio_tipus' => "El nen amb dislèxia de seleccionar cada lletra en l'ordre corresponent per formar una paraula.
                                    Treballarà el vocabulari i la memòria de treball."
                                ),
                                array(
                                    'nom_tipus' => "Discriminació visual d'una paraula",
                                    'descripcio_tipus' => "L'objectiu d'aquesta activitat és que el nen aconsegueixi discriminar dins d'un grup de paraules quin
                                    existeix realment."
                                ));

                                private function seedTipus(){
                                    DB::table('Tipuses')->delete();
                                    foreach( $this->arrayTipus as $tipus ) {
                                        $t = new Tipus;
                                        $t->nom_tipus = $tipus['nom_tipus'];
                                        $t->descripcio_tipus = $tipus['descripcio_tipus'];
                                        $t->save();
                                    }}


}
