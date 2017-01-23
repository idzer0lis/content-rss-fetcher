<?php

/**
 * Class blogReader
 */
//TODO: get css links
//TODO: preverse css links


class blogReader {
    /**
     * blogReader constructor.
     * @param $url
     */
    function __construct($url) {

        $this->url = $url;
    }

    /**
     * @param $start
     * @param $end
     * @return array
     */
    function filterContent($start, $end) {

        $content = $this->get_content();
        $result = array();

        //$start = preg_quote('<div class="col-md-4 col-sm-6 col-xs-12 pt-cv-content-item pt-cv-1-col"');
        //$end = preg_quote('<\/div><\/div><\/div>');


        preg_match('/' . $start. '.*?' . $end . '/s', $content, $result); //may refactor

        $domain = explode('/', $this->url); //Url provided may be domain.com or domain.com/stuff

        $result = str_replace($domain[0], '/', $result);

        $result = str_replace('/wp-content/', $domain[0] . '/wp-content/', $result);

        //$cssLinks = $this->getCssLinks($content);//implode('', $this->getCssLinks($content));

        return $result;
    }

    /**
     * @param $url
     * @return mixed
     */
    function get_content(){ //TODO: optimize

        $crl = curl_init();
        $timeout = 5;
        curl_setopt ($crl, CURLOPT_URL,$this->url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;

    }

    function getCssLinks($contentFetched) {

        $contentFetched = $this->get_content();
        //$firstPart = substr($contentFetched, 100, 10000);

        //echo $contentFetched;

        $test = preg_quote(".link rel='stylesheet'(.*?)>");
        preg_match('/<link rel=(.*)>/', $contentFetched, $result);

        return $result;
    }

}

?>