<?php

class Post extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalcon_app");
        $this->setSource("post");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Post[]|Post|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Post|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
