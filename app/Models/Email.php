<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Email extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message_id',
        'subject',
        'from_address',
        'to_addresses',
        'cc_addresses',
        'bcc_addresses',
        'sent_at',
        'status',
        'has_attachments',
        'eml_path',
        'size_bytes',
        'locked_by_user_id',
        'locked_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sent_at' => 'datetime',
        'locked_at' => 'datetime',
        'has_attachments' => 'boolean',
        'size_bytes' => 'integer',
        'locked_by_user_id' => 'integer',
    ];

    /**
     * Get the user who has locked this email.
     */
    public function lockedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'locked_by_user_id');
    }

    /**
     * Check if the email is locked.
     */
    public function isLocked(): bool
    {
        return !is_null($this->locked_by_user_id) && !is_null($this->locked_at);
    }

    /**
     * Lock the email for a specific user.
     */
    public function lockForUser(int $userId): void
    {
        $this->update([
            'locked_by_user_id' => $userId,
            'locked_at' => now(),
        ]);
    }

    /**
     * Unlock the email.
     */
    public function unlock(): void
    {
        $this->update([
            'locked_by_user_id' => null,
            'locked_at' => null,
        ]);
    }

    /**
     * Get the formatted size in human readable format.
     */
    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->size_bytes;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Get the to addresses as an array.
     */
    public function getToAddressesArrayAttribute(): array
    {
        return $this->to_addresses ? json_decode($this->to_addresses, true) : [];
    }

    /**
     * Get the cc addresses as an array.
     */
    public function getCcAddressesArrayAttribute(): array
    {
        return $this->cc_addresses ? json_decode($this->cc_addresses, true) : [];
    }

    /**
     * Get the bcc addresses as an array.
     */
    public function getBccAddressesArrayAttribute(): array
    {
        return $this->bcc_addresses ? json_decode($this->bcc_addresses, true) : [];
    }
}
