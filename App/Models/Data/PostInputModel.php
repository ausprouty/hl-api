<?php

namespace App\Models\Data;

class PostInputModel
{
    public $data;

    public function __construct($postData)
    {
        $this->data = $this->sanitize($postData);
    }

    private function sanitize($data)
    {
        $sanitized = array();
        $sanitizedMailLists = array();

        foreach ($data as $field) {
            $name = $field['name'];
            $value = $field['value'];

            if (preg_match('/^mail_lists\[[^\]]+\]$/', $name)) {
                $sanitizedMailLists[] = filter_var($value, FILTER_SANITIZE_STRING);
            } else {
                switch ($name) {
                    case 'email':
                        $sanitized[$name] = filter_var($value, FILTER_SANITIZE_EMAIL);
                        break;
                    default:
                        $sanitized[$name] = filter_var($value, FILTER_SANITIZE_STRING);
                        break;
                }
            }
        }

        $sanitized['selected_mail_lists'] = implode(',', $sanitizedMailLists);

        return $sanitized;
    }

    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
}
