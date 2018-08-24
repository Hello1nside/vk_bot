<?php

/* @pages/groups.html.twig */
class __TwigTemplate_065bfc93a828b9dab65a2358f6e42f40a42f4226be02b7081ca5670e272a753a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("_layout.html.twig", "@pages/groups.html.twig", 1);
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
        echo "Groups | run.project";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div id=\"app\" class=\"container\">
        <div class=\"row addGroup\">
            <button class=\"btn btn-default\" @click=\"parsePosts()\">Parse posts</button>
            <br><br>
            <input type=\"text\" class=\"defaultInput\" v-model=\"addGroupForm.ownerId\" placeholder=\"Owner id\">
            <input type=\"text\" class=\"defaultInput\" v-model=\"addGroupForm.url\" placeholder=\"Url\">
            <input type=\"text\" class=\"defaultInput\" v-model=\"addGroupForm.name\" placeholder=\"Name\">
            <input type=\"text\" class=\"defaultInput\" v-model=\"addGroupForm.tag\" placeholder=\"Hashtag\">
            <button @click=\"addGroup()\" @keyup.enter=\"addGroup()\" class=\"btn btn-default\">add</button>
        </div>
        <div class=\"row\">
            <div class=\"col-md-10\">
                <div class=\"vkBotTable\">
                    <table class=\"table\">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Hashtag</th>
                            <th>Owner id</th>
                            <th>St</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for=\"(group, i) in groups\">
                            <td>\${group.id}</td>
                            <td>\${group.name}</td>
                            <td>
                                <a :href=\"group.url\" target=\"_blank\">\${group.url}</a>
                            </td>
                            <td>\${group.tag}</td>
                            <td>\${group.owner_id}</td>
                            <td>\${group.st}</td>
                            <td class=\"action\">
                                <i class=\"fas fa-trash-alt delete\" @click=\"deleteGroup(group)\"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
";
    }

    // line 53
    public function block_script($context, array $blocks = array())
    {
        // line 54
        echo "    <script src=\"/me/resources/assets/js/pages/groups.js?";
        echo twig_escape_filter($this->env, ($context["hash"] ?? null), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@pages/groups.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 54,  92 => 53,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '_layout.html.twig' %}

{% block title %}Groups | run.project{% endblock %}

{% block content %}
    <div id=\"app\" class=\"container\">
        <div class=\"row addGroup\">
            <button class=\"btn btn-default\" @click=\"parsePosts()\">Parse posts</button>
            <br><br>
            <input type=\"text\" class=\"defaultInput\" v-model=\"addGroupForm.ownerId\" placeholder=\"Owner id\">
            <input type=\"text\" class=\"defaultInput\" v-model=\"addGroupForm.url\" placeholder=\"Url\">
            <input type=\"text\" class=\"defaultInput\" v-model=\"addGroupForm.name\" placeholder=\"Name\">
            <input type=\"text\" class=\"defaultInput\" v-model=\"addGroupForm.tag\" placeholder=\"Hashtag\">
            <button @click=\"addGroup()\" @keyup.enter=\"addGroup()\" class=\"btn btn-default\">add</button>
        </div>
        <div class=\"row\">
            <div class=\"col-md-10\">
                <div class=\"vkBotTable\">
                    <table class=\"table\">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Hashtag</th>
                            <th>Owner id</th>
                            <th>St</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for=\"(group, i) in groups\">
                            <td>\${group.id}</td>
                            <td>\${group.name}</td>
                            <td>
                                <a :href=\"group.url\" target=\"_blank\">\${group.url}</a>
                            </td>
                            <td>\${group.tag}</td>
                            <td>\${group.owner_id}</td>
                            <td>\${group.st}</td>
                            <td class=\"action\">
                                <i class=\"fas fa-trash-alt delete\" @click=\"deleteGroup(group)\"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block script %}
    <script src=\"/me/resources/assets/js/pages/groups.js?{{ hash }}\"></script>
{% endblock %}", "@pages/groups.html.twig", "/srv/www/mudrahel.com/me/resources/views/pages/groups.html.twig");
    }
}
