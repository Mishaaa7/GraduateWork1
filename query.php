<?php
class query
{
    private $pg_con;

    function __construct($pg_con)
    {
        $this->pg_con = $pg_con;
    }

    function add_user ($social_id, $first_name, $last_name, $user_json, $email = NULL, $telefon = NULL) {
        pg_prepare($this->pg_con, "new_user", 'INSERT INTO myschema.users(social_id, firstname, surname, email, telefon, social) VALUES ($1, $2, $3, $4, $5, $6)');
        pg_execute($this->pg_con, "new_user", array($social_id, $first_name, $last_name, $email, $telefon, $user_json));
    }

    function add_record ($id_user) {
        pg_prepare($this->pg_con, "new_activity", 'INSERT INTO myschema.user_activity(id_user, start_activity) VALUES ($1, now())');
        pg_execute($this->pg_con, "new_activity", array($id_user));
    }


}