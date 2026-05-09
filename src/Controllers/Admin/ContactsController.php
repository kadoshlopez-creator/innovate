<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Session;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function index(): void
    {
        $this->requireAdmin();

        $page     = max(1, (int) $this->request->get('page', 1));
        $contacts = Contact::paginate($page, 20);
        $total    = Contact::count();

        $this->view('admin/contacts/index', [
            'title'    => 'Mensajes',
            'contacts' => $contacts,
            'total'    => $total,
            'page'     => $page,
            'pages'    => (int) ceil($total / 20),
        ], 'admin');
    }

    public function show(string $id): void
    {
        $this->requireAdmin();

        $contact = Contact::find((int) $id);
        if (!$contact) {
            Session::flash('error', 'Mensaje no encontrado.');
            $this->redirect('/admin/contactos');
        }

        Contact::markRead((int) $id);

        $this->view('admin/contacts/show', [
            'title'   => 'Mensaje de ' . $contact['name'],
            'contact' => $contact,
        ], 'admin');
    }

    public function destroy(string $id): void
    {
        $this->requireRole('admin'); // only 'admin' role can delete
        $this->validateCSRF();

        Contact::delete((int) $id);
        Session::flash('success', 'Mensaje eliminado.');
        $this->redirect('/admin/contactos');
    }
}
