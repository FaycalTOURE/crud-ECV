<?php

abstract class Genre
{
    protected $genreID,
              $genreType,
              $genreDesc;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
        $this->type = strtolower(static::class);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->genreID;
    }

    /**
     * @param mixed $genreID
     */
    public function setID($genreID)
    {
        $this->genreID = $genreID;
    }

    /**
     * @return mixed
     */
    public function getGenreType()
    {
        return $this->genreType;
    }

    /**
     * @param mixed $genreType
     * @return Genre
     */
    public function setGenreType($genreType)
    {
        $this->genreType = $genreType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenreDesc()
    {
        return $this->genreDesc;
    }

    /**
     * @param mixed $genreDesc
     * @return Genre
     */
    public function setGenreDesc($genreDesc)
    {
        $this->genreDesc = $genreDesc;
        return $this;
    }

}