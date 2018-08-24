<?php

/* @pages/example2.html.twig */
class __TwigTemplate_a4817685f28d4ca7c2e8f307b076f9fc66d2fe22be6d23eb0db48dac9906cab1 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("_layout.html.twig", "@pages/example2.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
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
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
\t<link rel=\"stylesheet\" href=\"/resources/assets/css/example.css\">
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "Example2 | run.project";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "\t<h1>Example2.html.twig</h1>
\t";
        // line 12
        $this->loadTemplate("@components/mail.html.twig", "@pages/example2.html.twig", 12)->display($context);
    }

    public function getTemplateName()
    {
        return "@pages/example2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 12,  54 => 11,  51 => 10,  45 => 8,  37 => 4,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"_layout.html.twig\" %}

{% block head %}
\t{{ parent() }}
\t<link rel=\"stylesheet\" href=\"/resources/assets/css/example.css\">
{% endblock %}

{% block title %}Example2 | run.project{% endblock %}

{% block content %}
\t<h1>Example2.html.twig</h1>
\t{% include('@components/mail.html.twig') %}
{% endblock %}", "@pages/example2.html.twig", "/srv/www/mudrahel.com/me/resources/views/pages/example2.html.twig");
    }
}
