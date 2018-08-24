<?php

/* _layout.html.twig */
class __TwigTemplate_86041b62b5f1ee95a3885c3ff103d06443b11e9d179b015ef3ba521124b06585 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
            'script' => array($this, 'block_script'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
\t";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 31
        echo "</head>
<body>
\t<div id=\"nav\">
\t\t";
        // line 34
        $this->loadTemplate("@components/nav.html.twig", "_layout.html.twig", 34)->display($context);
        // line 35
        echo "\t</div>
\t<div id=\"content\">
\t\t";
        // line 37
        $this->displayBlock('content', $context, $blocks);
        // line 40
        echo "\t</div>
\t<div id=\"footer\">
\t\t";
        // line 42
        $this->displayBlock('footer', $context, $blocks);
        // line 45
        echo "\t</div>
\t";
        // line 46
        $this->displayBlock('script', $context, $blocks);
        // line 47
        echo "</body>
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\"
\t\t\t  content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
\t\t<link rel=\"stylesheet\" href=\"/me/resources/assets/css/index.css?11\">
\t\t";
        // line 11
        echo "\t\t<script src=\"https://cdn.jsdelivr.net/npm/vue\"></script>
\t\t<script src=\"https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.min.js\"></script>
\t\t";
        // line 14
        echo "\t\t<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\"
\t\t\t  integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\"
\t\t\t  crossorigin=\"anonymous\">
\t\t";
        // line 18
        echo "\t\t<link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i\"
\t\t\t  rel=\"stylesheet\">
\t\t<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.2.0/css/all.css\"
\t\t\t  integrity=\"sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ\"
\t\t\t  crossorigin=\"anonymous\">
\t\t<link rel=\"stylesheet\" href=\"/me/resources/assets/css/index.css?";
        // line 23
        echo twig_escape_filter($this->env, ($context["hash"] ?? null), "html", null, true);
        echo "\">

\t\t";
        // line 26
        echo "\t\t<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
\t\t<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>

\t\t<title>";
        // line 29
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t";
    }

    public function block_title($context, array $blocks = array())
    {
        echo "Simple title";
    }

    // line 37
    public function block_content($context, array $blocks = array())
    {
        // line 38
        echo "\t\t\t<h1>Content from _layout.html.twig</h1>
\t\t";
    }

    // line 42
    public function block_footer($context, array $blocks = array())
    {
        // line 43
        echo "
\t\t";
    }

    // line 46
    public function block_script($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 46,  122 => 43,  119 => 42,  114 => 38,  111 => 37,  100 => 29,  95 => 26,  90 => 23,  83 => 18,  78 => 14,  74 => 11,  67 => 5,  64 => 4,  59 => 47,  57 => 46,  54 => 45,  52 => 42,  48 => 40,  46 => 37,  42 => 35,  40 => 34,  35 => 31,  33 => 4,  28 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>
<html lang=\"en\">
<head>
\t{% block head %}
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\"
\t\t\t  content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
\t\t<link rel=\"stylesheet\" href=\"/me/resources/assets/css/index.css?11\">
\t\t{#start vue#}
\t\t<script src=\"https://cdn.jsdelivr.net/npm/vue\"></script>
\t\t<script src=\"https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.min.js\"></script>
\t\t{#start bootstrap#}
\t\t<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\"
\t\t\t  integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\"
\t\t\t  crossorigin=\"anonymous\">
\t\t{#donts#}
\t\t<link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i\"
\t\t\t  rel=\"stylesheet\">
\t\t<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.2.0/css/all.css\"
\t\t\t  integrity=\"sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ\"
\t\t\t  crossorigin=\"anonymous\">
\t\t<link rel=\"stylesheet\" href=\"/me/resources/assets/css/index.css?{{ hash }}\">

\t\t{#jquery#}
\t\t<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
\t\t<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>

\t\t<title>{% block title %}Simple title{% endblock %}</title>
\t{% endblock %}
</head>
<body>
\t<div id=\"nav\">
\t\t{% include('@components/nav.html.twig') %}
\t</div>
\t<div id=\"content\">
\t\t{% block content %}
\t\t\t<h1>Content from _layout.html.twig</h1>
\t\t{% endblock %}
\t</div>
\t<div id=\"footer\">
\t\t{% block footer %}

\t\t{% endblock %}
\t</div>
\t{% block script %}{% endblock %}
</body>
</html>", "_layout.html.twig", "/srv/www/mudrahel.com/me/resources/views/_layout.html.twig");
    }
}
