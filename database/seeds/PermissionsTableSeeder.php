<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new App\Models\Permission;
        $user->code = 'departments-create';
        $user->name = 'Może dodawać ryzyka ubezpieczeniowe';
        $user->description = 'Użytkownik może dodawać departamenty oraz edytować i usuwać utworzone przez siebie departamenty';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'departments-update';
        $user->name = 'Może edytować wszystkie ryzyka ubezpieczeniowe';
        $user->description = 'Użytkownik może edytować wszystkie departamenty';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'departments-delete';
        $user->name = 'Może usuwać wszystkie ryzyka ubezpieczeniowe';
        $user->description = 'Użytkownik może usuwać wszystkie departamenty';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'departments-view';
        $user->name = 'Może usuwać wszystkie ryzyka ubezpieczeniowe';
        $user->description = 'Użytkownik może przeglądać szczegóły departamentu';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'departments-viewany';
        $user->name = 'Może usuwać wszystkie ryzyka ubezpieczeniowe';
        $user->description = 'Użytkownik może przeglądać listę wszystkich departamentów (Zakładka HR -> Departamenty)';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'employees-create';
        $user->name = 'Może dodawać produkty pracownicze';
        $user->description = 'Użytkownik może dodawać produkty pracownicze oraz edytować i usuwać utworzone przez siebie produkty pracownicze';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'employees-update';
        $user->name = 'Może edytować wszystkie produkty pracownicze';
        $user->description = 'Użytkownik może edytować wszystkie produkty pracownicze';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'employees-delete';
        $user->name = 'Może usuwać wszystkie produkty pracownicze';
        $user->description = 'Użytkownik może usuwać wszystkie produkty pracownicze';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'file-categories-create';
        $user->name = 'Może dodawać kategorie dokumentów';
        $user->description = 'Użytkownik może dodawać kategorie dokumentów oraz edytować i usuwać utworzone przez siebie kategorie dokumentów';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'file-categories-update';
        $user->name = 'Może edytować wszystkie kategorie dokumentów';
        $user->description = 'Użytkownik może edytować wszystkie kategorie dokumentów';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'file-categories-delete';
        $user->name = 'Może usuwać wszystkie kategorie dokumentów';
        $user->description = 'Użytkownik może usuwać wszystkie kategorie dokumentów';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'file-categories-view';
        $user->name = 'Może przeglądać szczegóły kategorii dokumentów';
        $user->description = 'Użytkownik może przeglądać szczegóły kategorii dokumentów';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'file-categories-viewany';
        $user->name = 'Może przeglądać listę wszystkich kategorii dokumentów';
        $user->description = 'Użytkownik może przeglądać listę wszystkich kategorii dokumentów (Zakładka Administracja -> Kategorie Dokumentów)';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'files-create';
        $user->name = 'Może dodawać dokumenty';
        $user->description = 'Użytkownik może dodawać dokumenty oraz edytować i usuwać utworzone przez siebie dokumenty';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'files-update';
        $user->name = 'Może edytować wszystkie dokumenty';
        $user->description = 'Użytkownik może edytować wszystkie dokumenty';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'files-delete';
        $user->name = 'Może usuwać wszystkie dokumenty';
        $user->description = 'Użytkownik może usuwać wszystkie dokumenty';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'files-viewany';
        $user->name = 'Może przeglądać listę wszystkich dokumentów';
        $user->description = 'Użytkownik może przeglądać listę wszystkich dokumentów (Zakładka Administracja -> Dokumenty)';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'funds-create';
        $user->name = 'Może dodawać fundusze';
        $user->description = 'Użytkownik może dodawać fundusze oraz edytować i usuwać utworzone przez siebie fundusze';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'funds-update';
        $user->name = 'Może edytować wszystkie fundusze';
        $user->description = 'Użytkownik może edytować wszystkie fundusze';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'funds-delete';
        $user->name = 'Może usuwać wszystkie fundusze';
        $user->description = 'Użytkownik może usuwać wszystkie fundusze';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'investments-create';
        $user->name = 'Może dodawać produkty inwestycyjne';
        $user->description = 'Użytkownik może dodawać produkty inwestycyjne oraz edytować i usuwać utworzone przez siebie produkty inwestycyjne';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'investments-update';
        $user->name = 'Może edytować wszystkie produkty inwestycyjne';
        $user->description = 'Użytkownik może edytować wszystkie produkty inwestycyjne';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'investments-delete';
        $user->name = 'Może usuwać wszystkie produkty inwestycyjne';
        $user->description = 'Użytkownik może usuwać wszystkie produkty inwestycyjne';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'news-create';
        $user->name = 'Może dodawać aktualności';
        $user->description = 'Użytkownik może dodawać aktualności oraz edytować i usuwać utworzone przez siebie aktualności';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'news-update';
        $user->name = 'Może edytować wszystkie aktualności';
        $user->description = 'Użytkownik może edytować wszystkie aktualności';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'news-delete';
        $user->name = 'Może usuwać wszystkie aktualności';
        $user->description = 'Użytkownik może usuwać wszystkie aktualności';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'news-view';
        $user->name = 'Może przeglądać szczegóły aktualności';
        $user->description = 'Użytkownik może przeglądać szczegóły aktualności';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'news-viewany';
        $user->name = 'Może przeglądać listę wszystkich aktualności';
        $user->description = 'Użytkownik może przeglądać listę wszystkich aktualności (Zakładka Aktualności)';
        $user->save();
        
        $user = new App\Models\Permission;
        $user->code = 'notes-create';
        $user->name = 'Może dodawać notatki';
        $user->description = 'Użytkownik może dodawać notatki oraz edytować i usuwać utworzone przez siebie notatki';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'notes-update';
        $user->name = 'Może edytować wszystkie notatki';
        $user->description = 'Użytkownik może edytować wszystkie notatki';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'notes-delete';
        $user->name = 'Może usuwać wszystkie notatki';
        $user->description = 'Użytkownik może usuwać wszystkie notatki';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'notes-viewany';
        $user->name = 'Może przeglądać listę wszystkich notatek';
        $user->description = 'Użytkownik może przeglądać listę wszystkich notatek (Zakładka Administracja -> Notatki)';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'partners-create';
        $user->name = 'Może dodawać dystrybutorów';
        $user->description = 'Użytkownik może dodawać dystrybutorów oraz edytować i usuwać utworzonych przez siebie dystrybutorów';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'partners-update';
        $user->name = 'Może edytować wszystkich dystrybutorów';
        $user->description = 'Użytkownik może edytować wszystkich dystrybutorów';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'partners-delete';
        $user->name = 'Może usuwać wszystkich dystrybutorów';
        $user->description = 'Użytkownik może usuwać wszystkich dystrybutorów';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'permissions-viewany';
        $user->name = 'Może przeglądać listę wszystkich uprawnień';
        $user->description = 'Użytkownik może przeglądać listę wszystkich uprawnień (Zakładka Administracja -> Uprawnienia)';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'protectives-create';
        $user->name = 'Może dodawać produkty ochronne';
        $user->description = 'Użytkownik może dodawać produkty ochronne oraz edytować i usuwać utworzone przez siebie produkty ochronne';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'protectives-update';
        $user->name = 'Może edytować wszystkie produkty ochronne';
        $user->description = 'Użytkownik może edytować wszystkie produkty ochronne';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'protectives-delete';
        $user->name = 'Może usuwać wszystkie produkty ochronne';
        $user->description = 'Użytkownik może usuwać wszystkie produkty ochronne';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'replies-create';
        $user->name = 'Może dodawać odpowiedzi do aktualności';
        $user->description = 'Użytkownik może dodawać odpowiedzi do aktulności oraz edytować i usuwać utworzone przez siebie odpowiedzi do aktulności';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'replies-delete';
        $user->name = 'Może usuwać wszystkie odpowiedzi do aktualności';
        $user->description = 'Użytkownik może usuwać wszystkie odpowiedzi do aktualności';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'risks-create';
        $user->name = 'Może dodawać ryzyka ubezpieczeniowe';
        $user->description = 'Użytkownik może dodawać ryzyka ubezpieczeniowe oraz edytować i usuwać utworzone przez siebie ryzyka ubezpieczeniowe';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'risks-update';
        $user->name = 'Może edytować wszystkie ryzyka ubezpieczeniowe';
        $user->description = 'Użytkownik może edytować wszystkie ryzyka ubezpieczeniowe';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'risks-delete';
        $user->name = 'Może usuwać wszystkie ryzyka ubezpieczeniowe';
        $user->description = 'Użytkownik może usuwać wszystkie ryzyka ubezpieczeniowe';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'users-create';
        $user->name = 'Może dodawać pracowników';
        $user->description = 'Użytkownik może dodawać pracowników oraz edytować i usuwać utworzonych przez siebie pracowników';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'users-update';
        $user->name = 'Może edytować wszystkich pracowników';
        $user->description = 'Użytkownik może edytować wszystkich pracowników';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'users-delete';
        $user->name = 'Może usuwać wszystkich pracowników';
        $user->description = 'Użytkownik może usuwać wszystkich pracowników';
        $user->save();

        $user = new App\Models\Permission;
        $user->code = 'users-viewany';
        $user->name = 'Może przeglądać listę wszystkich pracowników';
        $user->description = 'Użytkownik może przeglądać listę wszystkich pracowników (Zakładka HR -> Pracownicy)';
        $user->save();
    }
}
