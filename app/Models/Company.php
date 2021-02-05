<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class Company extends Model
{
    use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address_line_1', 'address_line_2', 'town', 'post_code', 'country', 'state', 'logo', 'theme_color', 'copy_right_text', 'domain_link', 'main_email_address', 'support_email_address', 'billing_email_address', 'bank_account', 'bank_identification_code', 'vat_number', 'vat_percentage', 'customer_note', 'mail_driver', 'mail_host', 'mail_port', 'mail_encryption', 'mail_username', 'mail_password', 'paypal_mode', 'paypal_client_id', 'paypal_secret', 'paypal_currency_code','mail_sent','is_final_step_filled','more_info','reseller_id','reseller_password'
    ];

    /**
     * Get the user that owns the company.
    */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the user that owns the company.
    */
    public function owner()
    {
        return $this->hasOne('App\User')->where('is_admin', 1);
    }

    /**
     * Get the email tempaltes that owns the company.
    */
    public function emailTemplates()
    {
        return $this->hasMany('App\Models\EmailTemplate');
    }

    /**
     * Get the tuning type that owns the company.
    */
    public function tuningTypes()
    {
        return $this->hasMany('App\Models\TuningType');
    }

    /**
     * Get the tuning credit tire that owns the company.
    */
    public function tuningCreditTires()
    {
        return $this->hasMany('App\Models\TuningCreditTire');
    }

    /**
     * Get the tuning credit group that owns the company.
    */
    public function tuningCreditGroups()
    {
        return $this->hasMany('App\Models\TuningCreditGroup');
    }

	public function tuningCreditGroupsSelected()
    {
        return $this->hasMany('App\Models\TuningCreditGroup');
    }

    /**
     * Get the created at.
     *
     * @param  string  $value
     * @return string
     */
    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d M Y g:i A');
    }


    /**
     * Get the total Customers.
     *
     * @param  string  $value
     * @return string
     */
    public function getTotalCustomersAttribute($value) {
        if(!$this->users()){
            return 0;
        }else{
            return $this->users()->where('is_master', 0)->where('is_admin', 0)->count();
        }

    }

    /**
     * Get the updated at.
     *
     * @param  string  $value
     * @return string
     */
    public function getUpdatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d M Y g:i A');
    }

     /**
     * Check that user has domain link and email address.
     */

    public function setLogoAttribute($value)
    {
        $attribute_name = "logo";
        // or use your own disk, defined in config/filesystems.php
        $disk = config('backpack.base.root_disk_name');
        // destination path relative to the disk above
        $destination_path = "public/uploads/logo/";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image'))
        {
            // 0. Make the image
            $image = Image::make($value)->encode('jpg', 90);

            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';

            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $filename;
        }
    }
}
