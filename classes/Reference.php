<?php

namespace classes;

class Reference
{
    public $radio;
    public $surname;
    public $name;
    public $patronymic;
    public $reference;
    public $superpower;
    public $subtype;
    public $id;

    public function loadAttr($data)
    {
        $this->radio = $data['radio'];
        $this->surname = $data['surname'];
        $this->name = $data['name'];
        $this->patronymic = $data['patronymic'];
        $this->reference = $data['reference'];
        $this->superpower = $data['superpower'];
        $this->subtype = $data['subtype'];
        $this->id = $data['id'];
    }

    public function validate()
    {
        if (empty($this->radio)) {
            return false;
        }
        if (empty($this->surname)) {
            return false;
        }
        if (empty($this->name)) {
            return false;
        }
        if (empty($this->patronymic)) {
            return false;
        }
        if (empty($this->reference)) {
            return false;
        }
        if (empty($this->superpower)) {
            return false;
        }
        if (empty($this->subtype)) {
            return false;
        }
        return true;
    }

    public function insert()
    {
        $db = DB::getInstance();
        $arr = $db->prepare("INSERT INTO reference (letter_id, surname, name, patronymic, reference_number, description_superpower, description_subtype ) VALUES (?, ?, ?, ?, ?,?,?)");
        $arr->execute([
            $this->radio,
            $this->surname,
            $this->name,
            $this->patronymic,
            $this->reference,
            $this->superpower,
            $this->subtype
        ]);
        if ($arr->rowCount()>0){
            return true;
        }
        return false;
    }
    public function update()
    {
        if (!empty($this->id)){
            $db = DB::getInstance();
            $arr = $db->prepare("UPDATE reference 
                                      SET letter_id =?, surname=?, name=?, patronymic=?, reference_number=?, description_superpower=?, description_subtype=?
                                      WHERE id = ?");
            $arr->execute([
                $this->radio,
                $this->surname,
                $this->name,
                $this->patronymic,
                $this->reference,
                $this->superpower,
                $this->subtype,
                $this->id
            ]);
            if ($arr->rowCount() > 0) {
                return true;
            }
            return false;
        }
        return false;
    }
    public function delete(){
        if (!empty($this->id)){
            $db = DB::getInstance();
            $arr = $db->prepare("DELETE FROM reference WHERE id = ?");
            $arr->execute([
                $this->id
            ]);
            if ($arr->rowCount() > 0) {
                return true;
            }
            return false;
        }
        return false;
    }
}