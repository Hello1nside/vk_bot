<?php

/* @pages/posts.html.twig */
class __TwigTemplate_9f39a1ad14b2a2d80056e6c1c055b9d937aac277cf9877bf9e1be8ce9f54647f extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("_layout.html.twig", "@pages/posts.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
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
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"/me/resources/assets/css/popup.css?";
        // line 5
        echo twig_escape_filter($this->env, ($context["hash"] ?? null), "html", null, true);
        echo "\">
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Posts | run.project";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "    <div id=\"app\" class=\"container\">
        <div class=\"col-md-12\">
            <div class=\"row\">
                <div class=\"col-md-3\">
                    <div class=\"form-group\">
                        <label for=\"exampleSelect1\">Filter by status:</label>
                        <select class=\"form-control\"
                                id=\"exampleSelect1\"
                                v-model=\"filterBySt.selected\"
                                @change=\"getPosts(true)\"
                        >
                            <option value=\"void\"></option>
                            <option v-for=\"(option, i) in filterBySt.options\" :value=\"option.id\">
                                \${ option.st }
                            </option>
                        </select>
                    </div>
                </div>
                <div class=\"col-md-3\">
                    <div class=\"form-group\">
                        <label for=\"FilterByGroup\">Filter by Group:</label>
                        <select id=\"FilterByGroup\"
                                class=\"form-control\"
                                v-model=\"groups.selected\"
                                @change=\"getPosts(true)\"
                        >
                            <option value=\"void\"></option>
                            <option v-for=\"group in groups.list\" :value=\"group.id\">\${ group.name }</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class=\"vkBotTable\">
                <table class=\"table\">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Post ID</th>
                        <th>Group ID</th>
                        <th>Text</th>
                        <th>Image URL</th>
                        <th>St</th>
                        <th>Moderation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for=\"(post, i) in posts\">
                        <td>\${post.id}</td>
                        <td>\${post.post_id}</td>
                        <td>\${post.group_id}</td>
                        <td>\${post.text}</td>
                        <td>
                            <a  v-if=\"post.images[0].img_url\" :href=\"post.images[0].img_url\" target=\"_blank\">
                                original
                            </a><br><br>
                            <img @click=\"showOriginalImg(post.images[0].img_url)\"
                                 v-if=\"post.images[0].img_url\"
                                 :src=\"post.images[0].img_url\"
                                 style=\"width: 300px; height: 300px; cursor: pointer\"
                            >
                        </td>
                        <td style=\"vertical-align: inherit;\">
                            <span :style=\"'color: ' + statuses[post.st].color\">
                                \${statuses[post.st].text}
                            </span>
                        </td>
                        <td class=\"moderation\" style=\"vertical-align: inherit;\">
                            <i class=\"fas fa-check check\" @click=\"setSt(post, 2)\"></i>
                            <i class=\"fas fa-times cross\" @click=\"setSt(post, 0)\"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <popup v-if=\"showImgPopup\" @close=\"close()\">
            <div slot=\"content\">
                <img :src=\"popupImgSrc\" style=\"max-height: 550px\">
            </div>
        </popup>

        <div id=\"scrollToTop\" onclick=\"goUp();\"><i class=\"fas fa-arrow-circle-up\"></i></div>
    </div>
";
    }

    // line 96
    public function block_script($context, array $blocks = array())
    {
        // line 97
        echo "    <script src=\"/me/resources/assets/js/components/popup.js?";
        echo twig_escape_filter($this->env, ($context["hash"] ?? null), "html", null, true);
        echo "\"></script>
    <script src=\"/me/resources/assets/js/pages/posts.js?";
        // line 98
        echo twig_escape_filter($this->env, ($context["hash"] ?? null), "html", null, true);
        echo "\"></script>
    <script>
        let timeOut;
        function goUp() {
            let top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
            if(top > 0) {
                window.scrollBy(0,-100);
                timeOut = setTimeout('goUp()',20);
            } else clearTimeout(timeOut);
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "@pages/posts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 98,  148 => 97,  145 => 96,  58 => 11,  55 => 10,  49 => 7,  43 => 5,  38 => 4,  35 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '_layout.html.twig' %}

{% block head %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"/me/resources/assets/css/popup.css?{{ hash }}\">
{% endblock %}
{% block title %}Posts | run.project{% endblock %}


{% block content %}
    <div id=\"app\" class=\"container\">
        <div class=\"col-md-12\">
            <div class=\"row\">
                <div class=\"col-md-3\">
                    <div class=\"form-group\">
                        <label for=\"exampleSelect1\">Filter by status:</label>
                        <select class=\"form-control\"
                                id=\"exampleSelect1\"
                                v-model=\"filterBySt.selected\"
                                @change=\"getPosts(true)\"
                        >
                            <option value=\"void\"></option>
                            <option v-for=\"(option, i) in filterBySt.options\" :value=\"option.id\">
                                \${ option.st }
                            </option>
                        </select>
                    </div>
                </div>
                <div class=\"col-md-3\">
                    <div class=\"form-group\">
                        <label for=\"FilterByGroup\">Filter by Group:</label>
                        <select id=\"FilterByGroup\"
                                class=\"form-control\"
                                v-model=\"groups.selected\"
                                @change=\"getPosts(true)\"
                        >
                            <option value=\"void\"></option>
                            <option v-for=\"group in groups.list\" :value=\"group.id\">\${ group.name }</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class=\"vkBotTable\">
                <table class=\"table\">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Post ID</th>
                        <th>Group ID</th>
                        <th>Text</th>
                        <th>Image URL</th>
                        <th>St</th>
                        <th>Moderation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for=\"(post, i) in posts\">
                        <td>\${post.id}</td>
                        <td>\${post.post_id}</td>
                        <td>\${post.group_id}</td>
                        <td>\${post.text}</td>
                        <td>
                            <a  v-if=\"post.images[0].img_url\" :href=\"post.images[0].img_url\" target=\"_blank\">
                                original
                            </a><br><br>
                            <img @click=\"showOriginalImg(post.images[0].img_url)\"
                                 v-if=\"post.images[0].img_url\"
                                 :src=\"post.images[0].img_url\"
                                 style=\"width: 300px; height: 300px; cursor: pointer\"
                            >
                        </td>
                        <td style=\"vertical-align: inherit;\">
                            <span :style=\"'color: ' + statuses[post.st].color\">
                                \${statuses[post.st].text}
                            </span>
                        </td>
                        <td class=\"moderation\" style=\"vertical-align: inherit;\">
                            <i class=\"fas fa-check check\" @click=\"setSt(post, 2)\"></i>
                            <i class=\"fas fa-times cross\" @click=\"setSt(post, 0)\"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <popup v-if=\"showImgPopup\" @close=\"close()\">
            <div slot=\"content\">
                <img :src=\"popupImgSrc\" style=\"max-height: 550px\">
            </div>
        </popup>

        <div id=\"scrollToTop\" onclick=\"goUp();\"><i class=\"fas fa-arrow-circle-up\"></i></div>
    </div>
{% endblock %}

{% block script %}
    <script src=\"/me/resources/assets/js/components/popup.js?{{ hash }}\"></script>
    <script src=\"/me/resources/assets/js/pages/posts.js?{{ hash }}\"></script>
    <script>
        let timeOut;
        function goUp() {
            let top = Math.max(document.body.scrollTop,document.documentElement.scrollTop);
            if(top > 0) {
                window.scrollBy(0,-100);
                timeOut = setTimeout('goUp()',20);
            } else clearTimeout(timeOut);
        }
    </script>
{% endblock %}", "@pages/posts.html.twig", "/srv/www/mudrahel.com/me/resources/views/pages/posts.html.twig");
    }
}
