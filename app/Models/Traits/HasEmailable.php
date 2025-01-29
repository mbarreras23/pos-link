<?php

namespace App\Models\Traits;

use App\Models\Email;

trait HasEmailable
{
    // Relationships
    public function emails()
    {
        return $this->morphMany(Email::class, "emailable");
    }

    // Functions
    public function assignEmails(string|array $emails): void
    {
        collect($emails)->each(fn($email) => $this->assignEmail($email));
    }

    private function assignEmail(string $email): void
    {
        $this->emails()->create(["email" => $email]);
    }

    public function getEmails()
    {
        return $this->email
            ? $this->emails()->pluck("email")->merge([$this->email])
            : $this->emails()->pluck("email");
    }
}
