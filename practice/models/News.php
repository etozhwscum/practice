<?php


class News extends Model
{
    public $title;
    public $text;


    public function save()
    {
        try {
            $sth = $this->db->prepare("INSERT INTO `". $this->name() .
                "` SET `title` = :title, `text` = :text");
            $sth->execute(array('title' => $this->title, 'text' => $this->text));
        } catch (PDOException $e) {
            return ['error' => 'An error occurred while executing the query', 'status' => false, 'PDOcode'=>$e->getMessage()];
        }
        return ['status' => true];
    }

    public function getNews($id)
    {
        return $this->db->query("SELECT * FROM `news` WHERE id =".$id)->fetch();
    }

    public function update()
    {
        try {
            $sth = $this->db->prepare("UPDATE `". $this->name() .
                "` SET `text` = :text, `title` = :title WHERE news.id={$this->id}");
            $sth->execute(array('text' => $this->text, 'title' => $this->title));
        } catch (PDOException $e) {
            return ['error' => 'An error occurred while executing the query', 'status' => false, 'PDOcode'=>$e->getMessage()];
        }
        return ['status' => true];
    }
}