<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasApiTokens,HasFactory, Notifiable;


     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
      protected $guard='admin';
     protected $fillable = [
         'name',
         'email',
         'password',
         'status'

     ];
 
     /**
      * The attributes that should be hidden for serialization.
      *
      * @var array<int, string>
      */
     protected $hidden = [
         'password',
         'remember_token',
     ];
 
     /**
      * Get the attributes that should be cast.
      *
      * @return array<string, string>
      */
     protected function casts(): array
     {
         return [
             'email_verified_at' => 'datetime',
             'password' => 'hashed',
         ];
     }
 }
 
