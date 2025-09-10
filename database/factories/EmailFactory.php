<?php

namespace Database\Factories;

use App\Models\Email;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Email>
 */
class EmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Email::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hasAttachments = $this->faker->boolean(30); // 30% chance of having attachments
        $isLocked = $this->faker->boolean(10); // 10% chance of being locked
        
        // Generate realistic email addresses
        $fromAddress = $this->faker->unique()->safeEmail();
        $toAddresses = $this->generateEmailAddresses(1, 3);
        $ccAddresses = $this->faker->boolean(20) ? $this->generateEmailAddresses(0, 2) : null;
        $bccAddresses = $this->faker->boolean(10) ? $this->generateEmailAddresses(0, 1) : null;

        // Generate realistic subject (5-10 words)
        $subjectWords = $this->faker->words($this->faker->numberBetween(5, 10));
        $subject = ucfirst(implode(' ', $subjectWords));

        // Generate message ID (realistic email message ID format)
        $messageId = '<' . $this->faker->uuid() . '@' . $this->faker->domainName() . '>';

        // Generate realistic file size
        $sizeBytes = $this->faker->numberBetween(1024, 10485760); // 1KB to 10MB

        // Generate EML path if has attachments
        $emlPath = $hasAttachments ? 'emails/' . $this->faker->date('Y/m/d') . '/' . $this->faker->uuid() . '.eml' : null;

        return [
            'message_id' => $messageId,
            'subject' => $subject,
            'from_address' => $fromAddress,
            'to_addresses' => json_encode($toAddresses),
            'cc_addresses' => $ccAddresses ? json_encode($ccAddresses) : null,
            'bcc_addresses' => $bccAddresses ? json_encode($bccAddresses) : null,
            'sent_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'status' => $this->faker->randomElement(['new', 'processed', 'archived', 'deleted']),
            'has_attachments' => $hasAttachments,
            'eml_path' => $emlPath,
            'size_bytes' => $sizeBytes,
            'locked_by_user_id' => $isLocked ? 1 : null,
            'locked_at' => $isLocked ? $this->faker->dateTimeBetween('-7 days', 'now') : null,
        ];
    }

    /**
     * Generate an array of email addresses.
     */
    private function generateEmailAddresses(int $min = 1, int $max = 3): array
    {
        $count = $this->faker->numberBetween($min, $max);
        $addresses = [];
        
        for ($i = 0; $i < $count; $i++) {
            $addresses[] = $this->faker->unique()->safeEmail();
        }
        
        return $addresses;
    }

    /**
     * Indicate that the email has attachments.
     */
    public function withAttachments(): static
    {
        return $this->state(fn (array $attributes) => [
            'has_attachments' => true,
            'eml_path' => 'emails/' . $this->faker->date('Y/m/d') . '/' . $this->faker->uuid() . '.eml',
            'size_bytes' => $this->faker->numberBetween(1048576, 10485760), // 1MB to 10MB
        ]);
    }

    /**
     * Indicate that the email is locked by a user.
     */
    public function locked(): static
    {
        return $this->state(fn (array $attributes) => [
            'locked_by_user_id' => $this->faker->numberBetween(1, 6), // Assuming we have users with IDs 1-6
            'locked_at' => $this->faker->dateTimeBetween('-7 days', 'now'),
        ]);
    }

    /**
     * Indicate that the email is new.
     */
    public function new(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'new',
            'locked_by_user_id' => null,
            'locked_at' => null,
        ]);
    }

    /**
     * Indicate that the email is processed.
     */
    public function processed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'processed',
        ]);
    }

    /**
     * Indicate that the email is archived.
     */
    public function archived(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'archived',
        ]);
    }
}
