<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    const DESCPROD = '<p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est. </p><p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est.</p>';

    public function run() {

        DB::table('users')->insert([
            [
                'name' => 'Mario', 'surname' => 'Rossi', 'cellulare' => '1234567890',
                'email' => 'mario@example.com', 'email_verified_at' => now(), 'username' => 'mario123',
                'password' => Hash::make('password123'), 'role' => 'user', 'genere' => 0, 'dataNascita' => '1990-01-01',
                'remember_token' => Str::random(10), 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Giulia', 'surname' => 'Verdi', 'cellulare' => '9876543210',
                'email' => 'giulia@example.com', 'email_verified_at' => now(), 'username' => 'giulia456',
                'password' => Hash::make('password456'), 'role' => 'user', 'genere' => 1, 'dataNascita' => '1995-05-10',
                'remember_token' => Str::random(10), 'created_at' => now(), 'updated_at' => now(),
            ]
        ]);

        DB::table('aziende')->insert([
            [
                
                'ragionesociale' => 'Azienda 1',
                'tipologia' => 'Tipologia 1',
                'desc' => 'Descrizione Azienda 1',
                'citta' => 'Città 1',
                'via' => 'Via 1',
                'cap' => '12345',
                'image' => 'https://picsum.photos/200/300',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
            
                'ragionesociale' => 'Azienda 2',
                'tipologia' => 'Tipologia 2',
                'desc' => 'Descrizione Azienda 2',
                'citta' => 'Città 2',
                'via' => 'Via 2',
                'cap' => '67890',
                'image' => 'https://picsum.photos/200/300',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'ragionesociale' => 'Azienda 3',
                'tipologia' => 'Tipologia 3',
                'desc' => 'Descrizione Azienda 3',
                'citta' => 'Città 3',
                'via' => 'Via 3',
                'cap' => '11111',
                'image' => 'https://picsum.photos/200/300',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'ragionesociale' => 'Azienda 4',
                'tipologia' => 'Tipologia 4',
                'desc' => 'Descrizione Azienda 4',
                'citta' => 'Città 4',
                'via' => 'Via 4',
                'cap' => '22222',
                'image' => 'https://picsum.photos/200/300',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'ragionesociale' => 'Azienda 5',
                'tipologia' => 'Tipologia 5',
                'desc' => 'Descrizione Azienda 5',
                'citta' => 'Città 5',
                'via' => 'Via 5',
                'cap' => '33333',
                'image' => 'https://picsum.photos/200/300',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('faqs')->insert([
            [
                
                'titolo' => 'Come faccio a cercare una promozione?',
                'corpo' => 'Per cercare una promozione devi cliccare nel box di ricerca ed inserire il nome della promozione che vuoi cercare.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'titolo' => 'Come vedo le aziende presenti nel sito?',
                'corpo' => 'Per vedere le aziende presenti nel sito devi cliccare su "Vedi tutte le aziende" scorrendo la homepage.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'titolo' => 'Come faccio a conttatarvi',
                'corpo' => 'Nella sezione in basso trovi un pulsante "Contattaci" che ti permette di inviarci una mail.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'titolo' => 'Domanda 4',
                'corpo' => 'Risposta 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'titolo' => 'Domanda 5',
                'corpo' => 'Risposta 5',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('promozioni')->insert([
            [
                
                'nome' => 'Promozione 1',
                'oggetto' => 'Oggetto promozione 1',
                'modalita' => 'Modalità promozione 1',
                'tempi_fruizione' => 'Tempi fruizione promozione 1',
                'luoghi_fruizione' => 'Luoghi fruizione promozione 1',
                'codice_promozione' => 'Codice promozione 1',
                'aziendeId' => 1, // 'azienId' => '1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nome' => 'Promozione 2',
                'oggetto' => 'Oggetto promozione 2',
                'modalita' => 'Modalità promozione 2',
                'tempi_fruizione' => 'Tempi fruizione promozione 2',
                'luoghi_fruizione' => 'Luoghi fruizione promozione 2',
                'codice_promozione' => 'Codice promozione 2',
                'aziendeId' => 2, // 'azienId' => '2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nome' => 'Promozione 3',
                'oggetto' => 'Oggetto promozione 1',
                'modalita' => 'Modalità promozione 1',
                'tempi_fruizione' => 'Tempi fruizione promozione 1',
                'luoghi_fruizione' => 'Luoghi fruizione promozione 1',
                'codice_promozione' => 'Codice promozione 1',
                'aziendeId' => 3, // 'azienId' => '3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nome' => 'Promozione 4',
                'oggetto' => 'Oggetto promozione 1',
                'modalita' => 'Modalità promozione 1',
                'tempi_fruizione' => 'Tempi fruizione promozione 1',
                'luoghi_fruizione' => 'Luoghi fruizione promozione 1',
                'codice_promozione' => 'Codice promozione 1',
                'aziendeId' => 4, // 'azienId' => '4
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nome' => 'Promozione 5',
                'oggetto' => 'Oggetto promozione 1',
                'modalita' => 'Modalità promozione 1',
                'tempi_fruizione' => 'Tempi fruizione promozione 1',
                'luoghi_fruizione' => 'Luoghi fruizione promozione 1',
                'codice_promozione' => 'Codice promozione 1',
                'aziendeId' => 5, // 'azienId' => '5
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nome' => 'Promozione 6',
                'oggetto' => 'Oggetto promozione 1',
                'modalita' => 'Modalità promozione 1',
                'tempi_fruizione' => 'Tempi fruizione promozione 1',
                'luoghi_fruizione' => 'Luoghi fruizione promozione 1',
                'codice_promozione' => 'Codice promozione 1',
                'aziendeId' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nome' => 'Promozione 7',
                'oggetto' => 'Oggetto promozione 1',
                'modalita' => 'Modalità promozione 1',
                'tempi_fruizione' => 'Tempi fruizione promozione 1',
                'luoghi_fruizione' => 'Luoghi fruizione promozione 1',
                'codice_promozione' => 'Codice promozione 1',
                'aziendeId' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nome' => 'Promozione 8',
                'oggetto' => 'Oggetto promozione 1',
                'modalita' => 'Modalità promozione 1',
                'tempi_fruizione' => 'Tempi fruizione promozione 1',
                'luoghi_fruizione' => 'Luoghi fruizione promozione 1',
                'codice_promozione' => 'Codice promozione 1',
                'aziendeId' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ] 
        ]);

    }

}