<?php

/* @pages/example.html.twig */
class __TwigTemplate_7a006b2f43c8a33f85983da1f064c1614cbe03cd1f5f5ceee5c387e0016180ae extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("_layout.html.twig", "@pages/example.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Example | run.project";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div id=\"example\">

    </div>
";
    }

    // line 11
    public function block_script($context, array $blocks = array())
    {
        echo "<script src=\"/me/resources/assets/js/example.js\"></script>";
    }

    public function getTemplateName()
    {
        return "@pages/example.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 11,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '_layout.html.twig' %}

{% block title %}Example | run.project{% endblock %}

{% block content %}
    <div id=\"example\">

    </div>
{% endblock %}

{% block script %}<script src=\"/me/resources/assets/js/example.js\"></script>{% endblock %}", "@pages/example.html.twig", "/srv/www/mudrahel.com/me/resources/views/pages/example.html.twig");
    }
}
