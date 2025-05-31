<?php

use App\Enums\SharePermissions;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('folders', function (Blueprint $table) {
            $table->string('share_token', 20)->nullable()->unique();
            $table->timestamp('token_expires_at')->nullable();
            $table->string('share_permission')->default(SharePermissions::View->value);
            $table->foreignId('shared_by_user_id')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('folders', function (Blueprint $table) {
            $table->dropColumn([
                'share_token',
                'token_expires_at',
                'share_permission',
                'shared_by_user_id',
            ]);
        });
    }
};
