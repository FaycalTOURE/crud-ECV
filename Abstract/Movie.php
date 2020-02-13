<?php
abstract class Movie
{
    protected $movieID,
              $movieTitle,
              $movieDesc,
              $movieRuntime,
              $movieCertificate,
              $movieRating,
              $movieReleaseDate;


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
    public function getID()
    {
        return $this->movieID;
    }

    /**
     * @param mixed $movieID
     * @return Movie
     */
    public function setID($movieID)
    {
        $this->movieID = $movieID;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getMovieTitle()
    {
        return $this->movieTitle;
    }

    /**
     * @param mixed $movieTitle
     * @return Movie
     */
    public function setMovieTitle($movieTitle)
    {
        $this->movieTitle = $movieTitle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMovieDesc()
    {
        return $this->movieDesc;
    }

    /**
     * @param mixed $movieDesc
     * @return Movie
     */
    public function setMovieDesc($movieDesc)
    {
        $this->movieDesc = $movieDesc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMovieRuntime()
    {
        return $this->movieRuntime;
    }

    /**
     * @param mixed $movieRuntime
     * @return Movie
     */
    public function setMovieRuntime($movieRuntime)
    {
        $this->movieRuntime = $movieRuntime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMovieCertificate()
    {
        return $this->movieCertificate;
    }

    /**
     * @param mixed $movieCertificate
     * @return Movie
     */
    public function setMovieCertificate($movieCertificate)
    {
        $this->movieCertificate = $movieCertificate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMovieRating()
    {
        return $this->movieRating;
    }

    /**
     * @param mixed $movieRating
     * @return Movie
     */
    public function setMovieRating($movieRating)
    {
        $this->movieRating = $movieRating;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMovieReleaseDate()
    {
        return $this->movieReleaseDate;
    }

    /**
     * @param mixed $movieReleaseDate
     * @return Movie
     */
    public function setMovieReleaseDate($movieReleaseDate)
    {
        $this->movieReleaseDate = $movieReleaseDate;
        return $this;
    }

}