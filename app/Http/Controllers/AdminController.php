<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewAziendaRequest;
use App\Http\Requests\NewFaqRequest;
use App\Models\Aziende;
use App\Models\User;
use App\Models\Faq;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;


class AdminController extends Controller
{

    public function create()
{
    return view('aggiunta_azienda');
}

    public function storeAzienda(NewAziendaRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $azienda = new Aziende;
        $azienda->fill($request->validated());
        $azienda->image = $imageName;
        $azienda->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images';
            $image->move($destinationPath, $imageName);
        };

        return response()->json(['redirect' => route('home')]);
        
    }


    public function update(NewAziendaRequest $request, $aziendeId)
    {

        
    $azienda = Aziende::find($aziendeId);
    $azienda->fill($request->validated());

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();

        $destinationPath = public_path() . '/images';
        $image->move($destinationPath, $imageName);

        // Rimuovi l'immagine precedente solo se ne esisteva una
        if (!is_null($azienda->image)) {
            $previousImage = public_path('images/' . $azienda->image);
            if (file_exists($previousImage)) {
                unlink($previousImage);
            }
        }

        $azienda->image = $imageName;
    }

    $azienda->update();

    return response()->json(['redirect' => route('home')]);
}




        public function destroy($aziendeId)
    {
        // Trova l'azienda da eliminare
        $azienda = Aziende::findOrFail($aziendeId);

        // Elimina l'azienda
        $azienda->delete();

        // Esegui eventuali altre azioni o reindirizzamenti

        // Ad esempio, puoi reindirizzare l'utente a una pagina di conferma
        return redirect()->route('home')->with('success', 'Azienda eliminata con successo.');
    }

    public function create2()
    {
        return view('aggiunta_staff');
    }


        public function addStaff(Request $request)
    {
        
        $oggi = Carbon::now();
        // Validazione dei dati del form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'surname' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'cellulare' => 'required|numeric|digits:10',
            'email' => 'required|string|email|unique:users',
            'username' => 'required|string|min:8|unique:users',
            'password' => 'required|string|min:8',
            'genere' => 'required|in:0,1',
            'dataNascita' => 'required|date|before_or_equal:'.$oggi,
        ]);

        // Creazione del nuovo utente staff
        $user = new User();
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->cellulare = $validatedData['cellulare'];
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = 'staff'; // Imposta il ruolo come "staff"
        $user->genere = $validatedData['genere'];
        $user->dataNascita = $validatedData['dataNascita'];

        $user->save();

        // Reindirizzamento o visualizzazione di un messaggio di successo
        return redirect()->route('home')->with('success', 'Utente staff aggiunto con successo!');
    }

    public function createFaq()
    {
        return view('aggiunta_faq');
    }


    public function storeFaq(NewFaqRequest $request)
    {
    $faq = new Faq;
    $faq->fill($request->validated());
    $faq->save();

    return response()->json(['redirect' => route('home')]);
    }


    public function modificaFaq($faqId)   
    {
        $faq=Faq::find($faqId);

        return view('pagina_modifica_faq')
        ->with('faq', $faq);
    }

    public function updateFaq(NewFaqRequest $request, $faqId)
    {  
        $faq=Faq::find($faqId);
        
        $faq->fill($request->validated());
        $faq->update();

    return response()->json(['redirect' => route('home')]);

    }

    public function destroyFaq($faqId)
    {
        // Trova la faq da eliminare
        $faq = Faq::findOrFail($faqId);

        // Elimina l'faq$faq
        $faq->delete();

        // Ad esempio, puoi reindirizzare l'utente a una pagina di conferma
        return redirect()->route('faqs')->with('success', 'Faq eliminata con successo.');
    }


    public function destroyUtenti($userId)
    {
        // Trova l'utente da eliminare
        $user = User::findOrFail($userId);

        // Elimina l'utente
        $user->delete();

        // Esegui eventuali altre azioni o reindirizzamenti

        // Ad esempio, puoi reindirizzare l'admin a una pagina di conferma
        return redirect()->route('home')->with('success', 'Utente eliminato con successo.');
    }

    public function searchUtenti(Request $request, $paged = 4)
{
    $query = $request->input('query');
    $user = User::where('role', 'user')
        ->where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('username', 'LIKE', "%$query%")
                ->orWhere('name', 'LIKE', "%$query%")
                ->orWhere('surname', 'LIKE', "%$query%");
        })
        ->paginate($paged);

    return view('elenco_utenti_search', compact('user', 'query'));
}


public function staff()
{
    return view('home');
}

public function searchStaff(Request $request, $paged = 4)
{
    $query = $request->input('query');
    $user = User::where('role', 'staff')
        ->where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('username', 'LIKE', "%$query%")
                ->orWhere('name', 'LIKE', "%$query%")
                ->orWhere('surname', 'LIKE', "%$query%");
        })
        ->paginate($paged);

    return view('elenco_staff_search', compact('user', 'query'));
}    

        public function show1($aziendeId) {
            $azienda = Aziende::find($aziendeId);
        
            if (!$azienda) {
                abort(404);
            }
        
            return view('pagina_modifica_azienda', compact('azienda'));
            }
    

    
    

}
