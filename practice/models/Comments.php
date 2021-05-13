<?php


class Comments extends Model
{
    public $id_user;
    public $id_news;
    public $text;

    public function save()
    {
        try {
            $sth = $this->db->prepare("INSERT INTO `" . $this->name() .
                "` SET `id_user` = :id_user, `id_news` = :id_news, `text` = :text");
            $sth->execute(array('id_news' => $this->id_news, 'id_user' => $this->id_user, 'text' => $this->text));
        } catch (PDOException $e) {
            return ['error' => 'An error occurred while executing the query', 'status' => false, 'PDOcode' => $e->getMessage()];
        }
        return ['status' => true];
    }

    public function getNews($id)
    {
        return $this->db->query("SELECT * FROM `news` WHERE id =" . $id)->fetch();
    }

    public function update()
    {
        try {
            $sth = $this->db->prepare("UPDATE `" . $this->name() .
                "` SET `text` = :text, `title` = :title WHERE news.id={$this->id}");
            $sth->execute(array('text' => $this->text, 'title' => $this->title));
        } catch (PDOException $e) {
            return ['error' => 'An error occurred while executing the query', 'status' => false, 'PDOcode' => $e->getMessage()];
        }
        return ['status' => true];
    }
}
