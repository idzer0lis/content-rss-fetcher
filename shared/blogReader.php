<?php

/**
 * Class contentReader
 */
//TODO: get css links
//TODO: preserve css links


class contentReader {
    /**
     * contentReader constructor.
     * @param $url
     */
    function __construct($url) {

        $this->url = $url;
    }

    /**
     * @param $start
     * @param $end
     * @return array
     *
     * Modify this function is blog ripped is not wordpress
     */
    function filterContent($start, $end) {

        $content = $this->get_content();

        //$start = preg_quote('<div class="col-md-4 col-sm-6 col-xs-12 pt-cv-content-item pt-cv-1-col"');
        //$end = preg_quote('<\/div><\/div><\/div>');


        preg_match_all('/' . $start. '.*?' . $end . '/s', $content, $result); //refactor

        //$result = array();

        //$domain = explode('/', $this->url); //Url provided may be domain.com or domain.com/stuff

        //if($domain[0] === '' || $domain[0] === NULL) $domain = $this->url;

        /*if(func_num_args() === 3) {

            $result = str_replace($this->url, '/ecommerce/shop/template/single-blog.php?blog=', $result[0]);

            $result = str_replace('/ecommerce/shop/template/single-blog.php?blog=wp-content/', $this->url . '/wp-content/', $result);

        }*/

        $result = str_replace($this->url, '/ecommerce/shop/template/single-blog.php?blog=', $result[0]);

        $result = str_replace('/ecommerce/shop/template/single-blog.php?blog=wp-content/', $this->url . '/wp-content/', $result);




        //$cssLinks = $this->getCssLinks($content);//implode('', $this->getCssLinks($content));

        return $result;
    }

    /**
     * @param $url
     * @return mixed
     */
    function get_content(){

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
        preg_match_all('<link rel="stylesheet".*?>', $contentFetched, $result);

        return $result;
    }

    function getSource() {
        return "<div class='row'></div><a href='$this->url'>Source</a></div>";
    }

}

?>