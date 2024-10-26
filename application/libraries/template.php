<?php
class Template
{
    protected $_CI;
    function __construct()
    {
        $this->_CI = &get_instance();
    }

    function display($template, $data = null)
    {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('template/header', $data, true);
        $data['_sidebar'] = $this->_CI->load->view('template/sidebar', $data, true);
        $this->_CI->load->view('/template.php', $data);
    }
    function IndonesiaTgl($tanggal)
    {
        $tgl = substr($tanggal, 8, 2);
        $bln = substr($tanggal, 5, 2);
        $thn = substr($tanggal, 0, 4);
        $awal = "$tgl-$bln-$thn";
        return $awal;
    }
}
