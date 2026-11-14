<?php

namespace App\Database\Seeds;

use CodeIgniter\CLI\CLI;
use CodeIgniter\Database\Seeder;
use RuntimeException;

class PromoverAdministrador extends Seeder
{
    // E-mail usado no login da conta que vai virar administradora
    private string $email = 'devrhayaneads@gmail.com';

    public function run()
    {
        $users = auth()->getProvider();
        $user  = $users->findByCredentials([
            'email' => $this->email,
        ]);

        if ($user === null) {
            // Mostra os e-mails cadastrados para facilitar a correção
            $cadastrados = $this->db->table('auth_identities')
                ->select('secret')
                ->where('type', 'email_password')
                ->get()
                ->getResultArray();

            $lista = implode(', ', array_column($cadastrados, 'secret')) ?: 'nenhum';

            throw new RuntimeException(
                'Usuário "' . $this->email . '" não encontrado. E-mails cadastrados: ' . $lista
            );
        }

        if (! $user->inGroup('admin')) {
            $user->addGroup('admin');
        }

        CLI::write('Usuário ' . $this->email . ' está no grupo admin.', 'green');
    }
}
