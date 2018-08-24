<?php

/* @pages/example3.html.twig */
class __TwigTemplate_077fcb865f271fe9505f3de0986bba4044e96e349ffd6315dc0b3f1d7f955aaf extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("_layout.html.twig", "@pages/example3.html.twig", 1);
        $this->blocks = array(
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
    public function block_title($context, array $blocks = array())
    {
        echo "Example3 | run.project";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "\t<h1>Example3.html.twig</h1>
    ";
        // line 7
        $this->displayParentBlock("content", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "@pages/example3.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 7,  42 => 6,  39 => 5,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"_layout.html.twig\" %}

{% block title %}Example3 | run.project{% endblock %}

{% block content %}
\t<h1>Example3.html.twig</h1>
    {{parent()}}
{% endblock %}", "@pages/example3.html.twig", "/srv/www/mudrahel.com/me/resources/views/pages/example3.html.twig");
    }
}
