<?php

/* @galleries/preview.twig */
class __TwigTemplate_1d19a544965d981c3770a845925e0c92651f7cba47f08b60ec2e78040a6b3807 extends Twig_SupTwgSgg_Template
{
    public function __construct(Twig_SupTwgSgg_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<a id=\"back\" style=\"margin-left:15px;display:none;\"
   href=\"";
        // line 2
        echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "view", 2 => array("gallery_id" => ($context["gallery_id"] ?? null))), "method"), "html", null, true);
        echo "\">
    &larr;";
        // line 3
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Back to the gallery")), "html", null, true);
        echo "
</a>

<iframe id=\"grid-gallery-preview\" data-post=\"";
        // line 6
        echo Twig_SupTwgSgg_escape_filter($this->env, ($context["post_id"] ?? null), "html", null, true);
        echo "\" src=\"";
        echo Twig_SupTwgSgg_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "/?p=";
        echo Twig_SupTwgSgg_escape_filter($this->env, ($context["post_id"] ?? null), "html", null, true);
        echo "&preview=true\" frameborder=\"0\" style=\"width:100%;margin: 10px 0 5px -10px;overflow-y:hidden;position: absolute;\"></iframe>

<script>
jQuery(document).ready(function(\$) {
\t\$iframe = \$('#grid-gallery-preview');
\t\$('#wpfooter').hide();
\t\$iframe.height(\$('#wpwrap').height() - 20);
});
</script>";
    }

    public function getTemplateName()
    {
        return "@galleries/preview.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 6,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        //@trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_SupTwgSgg_Source("", "@galleries/preview.twig", "/var/www/html/wordpress/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Galleries/views/preview.twig");
    }
}
