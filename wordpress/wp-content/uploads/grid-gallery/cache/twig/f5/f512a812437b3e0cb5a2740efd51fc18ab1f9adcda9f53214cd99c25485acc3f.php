<?php

/* @overview/index.twig */
class __TwigTemplate_36f21c328a24d1ac5f67e02a9331dad22dace8d4f17538cdb936b99876ee05cf extends Twig_SupTwgSgg_Template
{
    public function __construct(Twig_SupTwgSgg_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("grid-gallery.twig", "@overview/index.twig", 1);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "grid-gallery.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "
    <nav id=\"supsystic-breadcrumbs\" class=\"supsystic-breadcrumbs\">
        <a href=\"";
        // line 6
        echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries"), "method"), "html", null, true);
        echo "\">";
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Galleries")), "html", null, true);
        echo "</a>
        <i class=\"fa fa-angle-right\"></i>
        <a href=\"";
        // line 8
        echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries"), "method"), "html", null, true);
        echo "\">";
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Overview")), "html", null, true);
        echo "</a>
    </nav>";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "    <div class=\"supsystic-overview\">
        <div class=\"full-page\">
          <div class=\"plugin-title\"><img src=\"";
        // line 16
        echo Twig_SupTwgSgg_escape_filter($this->env, ($context["SGG_PLUGIN_URL"] ?? null), "html", null, true);
        echo "/src/GridGallery/Overview/assets/img/plugin-icon.png\">Photo Gallery by Supsystic</div>
          <div class=\"plugin-description\">Easily arrange your photos and videos with the WordPress Photo Gallery plugin by Supsystic. This Photo Gallery plugin is seriously powerful. It’s perfect for people who want the tools and flexibility to showcase their photos and videos in a truly spectacular fashion. And, best of all, it’s user friendly!
This plugin will help you bring your ideas to life quickly and easily. In no time you’ll be showing off an impressive gallery of all your photo and video assets.</div>
        </div>
        <div class=\"supsystic-overview-flex\">
        <div class=\"half-page half-page-left\">
            <div class=\"border-wrapper\">
              <ul>
                <li class=\"overview-section-btn\" data-section=\"faq\"><i class=\"fa fa-info-circle\"></i> FAQ and Documentation</li>
                <li class=\"overview-section-btn\" data-section=\"video\"><i class=\"fa fa-play\"></i> Video tutorial</li>
                <li class=\"overview-section-btn\" data-section=\"settings\"><i class=\"fa fa-cog\"></i> Server Settings</li>
                <li class=\"overview-section-btn\" data-section=\"support\"><i class=\"fa fa-life-ring\"></i> Support</li>
                <li class=\"overview-section-btn\" data-section=\"promo_video\"><i class=\"fa fa-star\"></i> Our promo video</li>
                <li class=\"overview-section-btn\"><a target=\"_blank\" title=\"Go to supsystic.com\" href=\"https://supsystic.com/plugins/photo-gallery/?utm_source=plugin&utm_campaign=gallery\"> Plugin page on supsystic.com <sup><i class=\"fa fa-external-link\"></i></sup></a></li>
                <li class=\"overview-section-btn\"><a target=\"_blank\" title=\"Go to supsystic.com\" href=\"https://supsystic.com/plugins/photo-gallery/?utm_source=plugin&utm_campaign=gallery\"> Compare FREE and PRO features <sup><i class=\"fa fa-external-link\"></i></sup></a></li>
                <li class=\"overview-section-btn\"><a target=\"_blank\" title=\"Go to supsystic.com\" href=\"https://supsystic.com/wordpress-plugins/?utm_source=plugin&utm_campaign=gallery\"> Check other supsystic FREE plugins <sup><i class=\"fa fa-external-link\"></i></sup></a></li>
              </ul>
            </div>

            <div class=\"border-wrapper\">
            <div class=\"overview-contact-form overview-section\" data-section=\"support\">
                <h3><i class=\"fa fa-life-ring\"></i> Support</h3>
                <div class=\"contact-info-section\">
                  <p><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> Our official support hours are 09:00 -18:00 GMT+02:00, Monday to Friday – excluding bank holidays and other official holidays.</p>
                  <p>The timescales listed below refer to these working hours.</p><br>
                  <p><em>Support requests are prioritized based on the type of license:</em></p>
                  <ul>
                    <li><p><em>Pro Support</em> is reserved for customers with an active Pro license. We respond to new priority support requests within 12 hours.</p></li>
                    <li><p><em>Standard Support</em> is provided to customers with an active Free license. We respond to standard support requests within 24h-48h.</p></li>
                  </ul><br>
                  <p><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> While we don’t guarantee that we will resolve the request in this time period, we will acknowledge it and communicate with the customer as appropriate to help resolve the issue.</p>
                </div>";
        // line 48
        $context["form"] = $this->loadTemplate("@core/form.twig", "@overview/index.twig", 48);
        // line 50
        echo $context["form"]->getopen("post", $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "overview", 1 => "sendMail"), "method"), array("id" => "form-settings", "style" => "max-width: 100%;", "_wpnonce" => ($context["_wpnonce"] ?? null)));
        echo "

                <table class=\"contact-form-table\" style=\"width: 100%;\">
                    <thead>";
        // line 54
        echo $context["form"]->getrow((call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Name")) . " *"),         // line 55
$context["form"]->gettext("name", ($context["SG_USER_NAME"] ?? null), array("required" => "")));
        // line 57
        echo $context["form"]->getrow((call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Email")) . " *"),         // line 58
$context["form"]->gettext("email", $this->getAttribute(($context["contactForm"] ?? null), "email", array()), array("required" => "")));
        // line 60
        echo $context["form"]->getrow((call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Website")) . " *"),         // line 61
$context["form"]->gettext("website", $this->getAttribute(($context["contactForm"] ?? null), "website", array()), array("required" => "")));
        // line 63
        echo $context["form"]->getrow((call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Subject")) . " *"),         // line 64
$context["form"]->gettext("subject", "", array("required" => "")));
        echo "
                    <tr>
                        <th scope=\"row\">
                            <label for=\"select-question\">";
        // line 67
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Topic")), "html", null, true);
        echo "</label>
                        </th>
                        <td>
                            <select id=\"select-question\" name=\"question\">
                                <option value=\"plugin_options\">";
        // line 72
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Plugin options")), "html", null, true);
        echo "
                                </option>
                                <option value=\"bug\">";
        // line 75
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Report a bug")), "html", null, true);
        echo "
                                </option>
                                <option value=\"functionallity\">";
        // line 78
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Require a new functionallity")), "html", null, true);
        echo "
                                </option>
                                <option value=\"security_issue\">";
        // line 81
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Report about security issue (XSS/SQLi and others)")), "html", null, true);
        echo "
                                </option>
                                <option value=\"other\">";
        // line 84
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Other")), "html", null, true);
        echo "
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope=\"row\" style=\"vertical-align: top;\">
                            <label for=\"mail-text\">";
        // line 91
        echo Twig_SupTwgSgg_escape_filter($this->env, (call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Message")) . " *"), "html", null, true);
        echo "</label>
                        </th>
                        <td>
                            <textarea id=\"mail-text\" name=\"message\" cols=\"50\" rows=\"3\" placeholder=\"";
        // line 94
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Hello Supsystic Team!")), "html", null, true);
        echo "\" required=\"\"></textarea>
                        </td>
                    </tr>

                    </thead>
                </table>
                <button id=\"send-mail\" type=\"submit\" class=\"button button-primary button-hero\">
                    <i class=\"fa fa-check-square\" aria-hidden=\"true\"></i>
                    Send email
                </button>
                <div class=\"required-notification\" style=\"color: red; float: left;\" hidden>Fields with * are required to fill</div>";
        // line 105
        echo $context["form"]->getclose();
        echo "
                <div class=\"clear\"></div>
            </div>

            <div id=\"contact-form-dialog\" hidden>
                <div class=\"on-error\" style=\"display:none\">
                    <p>";
        // line 111
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Some errors occurred while sending mail please send your message trough this contact form:")), "html", null, true);
        echo "</p>
                    <p><a href=\"https://supsystic.com/plugins/photo-gallery/#contact\" target=\"_blank\">https://supsystic.com/plugins/photo-gallery/#contact</a></p>
                </div>
                <div class=\"message\"></div>
            </div>

            <div data-section=\"faq\" class=\"faq-list overview-section\">
                <h3><i class=\"fa fa-info-circle\"></i> FAQ and Documentation</h3>
                <div class=\"faq-title\">
                    <i class=\"fa fa-info-circle\"></i>
                    Gallery plugin installation
                    <div class=\"description\" hidden>
                        One more advantage of responsive grid gallery WordPress plugin is an easy installation. To install it, you should make three following steps:</br>
                        1. Download Supsystic Gallery WordPress plugin.</br>
                        2. Upload to your WordPress plugins directory.</br>
                        3. Activate and enjoy.
                    </div>
                </div>
                <div class=\"faq-title\">
                    <i class=\"fa fa-info-circle\"></i>
                    Gallery doesn’t load on the front end. If the loading gallery icon just keeps playing but never loads the gallery.
                    <div class=\"description\" hidden>
                        Most likely there are conflicts with your theme or other plugins. Please contact us through our <a href=\"//supsystic.com/contact-us/\" target=\"_blank\">internal support</a>. We will check what is wrong and will help you to solve the problem.
                    </div>
                </div>
                <div class=\"faq-title\">
                    <i class=\"fa fa-info-circle\"></i>
                    How to change the position of photos in gallery?

                    <div class=\"description\" hidden>
                        To change the position of photos just drag them manually on the Images List and click save.  Also there you can sort the images by add date, create date, size, name and tags.
                    </div>
                </div>
\t\t\t\t<div class=\"faq-title\">
                    <i class=\"fa fa-info-circle\"></i>
                    What is Gallery Loader?

                    <div class=\"description\" hidden>
                        This is a new option of Photo Gallery by Supsystic, which can be found on the Main tab settings. With its help you can choose funny loader icons to entertain your users while they are waiting. Also you can set the color for your icon or disable this option at all, if you don’t need it.
\t\t\t\t\t\tLearn more about it in <a href=\"//supsystic.com/main-settings/\" target=\"_blank\">Main Settings.</a>
                    </div>
                </div>
                <div style=\"clear: both;\"></div>
                <a href=\"";
        // line 154
        echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "promo", 1 => "showTutorial"), "method"), "html", null, true);
        echo "\" class=\"button button-primary button-hero\">
                    <i class=\"fa fa-info-circle\"></i>";
        // line 156
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Start step-by-step tutorial")), "html", null, true);
        echo "
                </a>
                <a target=\"_blank\" href=\"https://supsystic.com/docs/gallery/?utm_source=plugin&utm_medium=faq&utm_campaign=gallery\" class=\"button button-primary button-hero\">
                    <i class=\"fa fa-info-circle\"></i>
                    Check all FAQs
                </a>
                <div class=\"clear\"></div>
            </div>

            <div data-section=\"video\" class=\"video overview-section\">
                <h3><i class=\"fa fa-play\"></i> Video tutorial</h3>
                <div align=\"center\">
                <iframe type=\"text/html\"
                        style=\"max-width: 640px;width: 100%;height: 360px;\"
                        src=\"http://www.youtube.com/embed/Tjr5j5grHlg\"
                        frameborder=\"0\">
                </iframe>
                <iframe type=\"text/html\"
                        style=\"max-width: 640px;width: 100%;height: 360px;\"
                        src=\"http://www.youtube.com/embed/CsFLxfsckpU\"
                        frameborder=\"0\">
                </iframe>
                </div>
                <div class=\"clear\"></div>
            </div>

            <div data-section=\"promo_video\" class=\"video overview-section\">
                <h3><i class=\"fa fa-star\"></i> Our promo video</h3>
                <div align=\"center\">
                <iframe type=\"text/html\"
                        style=\"max-width: 640px;width: 100%;height: 360px;\"
                        src=\"http://www.youtube.com/embed/dKd_9g6JzfU\"
                        frameborder=\"0\">
                </iframe>
                </div>
                <div class=\"clear\"></div>
            </div>

            <div data-section=\"settings\" class=\"server-settings overview-section\">
                <h3><i class=\"fa fa-cog\"></i> Server settings</h3>
                <ul class=\"settings-list\">";
        // line 197
        $context['_parent'] = $context;
        $context['_seq'] = Twig_SupTwgSgg_ensure_traversable(($context["serverSettings"] ?? null));
        foreach ($context['_seq'] as $context["title"] => $context["element"]) {
            // line 198
            echo "                        <li class=\"settings-line\" style=\"float: none;\">
                            <div class=\"settings-title\">";
            // line 199
            echo Twig_SupTwgSgg_escape_filter($this->env, Twig_SupTwgSgg_trim_filter($context["title"]), "html", null, true);
            echo ":</div>
                            <span>";
            // line 200
            echo Twig_SupTwgSgg_escape_filter($this->env, Twig_SupTwgSgg_trim_filter($this->getAttribute($context["element"], "value", array())), "html", null, true);
            echo "</span>
                        </li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['title'], $context['element'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 203
        echo "                </ul>
                <div class=\"clear\"></div>
            </div>
            </div>

        </div>

        <div class=\"half-page half-page-right\">";
        // line 211
        if (($this->getAttribute(($context["environment"] ?? null), "isPro", array(), "method") == false)) {
            // line 212
            echo "            <a href=\"https://supsystic.com/photo-gallery-free-to-pro/\" target=\"_blank\"><img class=\"overview-supsystic-img\" style=\"margin-bottom:20px;\" src=\"";
            echo Twig_SupTwgSgg_escape_filter($this->env, ($context["SGG_PLUGIN_URL"] ?? null), "html", null, true);
            echo "/src/GridGallery/Overview/assets/img/overview-pro-promo.png\"></a>";
        }
        // line 214
        echo "            <a href=\"https://supsystic.com/pricing/?utm_source=plugin&utm_campaign=gallery\" target=\"_blank\"><img class=\"overview-supsystic-img\" src=\"";
        echo Twig_SupTwgSgg_escape_filter($this->env, ($context["SGG_PLUGIN_URL"] ?? null), "html", null, true);
        echo "/src/GridGallery/Overview/assets/img/overview-01.png\"></a>
            <a href=\"https://supsystic.com/plugins/plugins-bundle/?utm_source=plugin&utm_campaign=gallery\" target=\"_blank\"><img class=\"overview-supsystic-img\" src=\"";
        // line 215
        echo Twig_SupTwgSgg_escape_filter($this->env, ($context["SGG_PLUGIN_URL"] ?? null), "html", null, true);
        echo "/src/GridGallery/Overview/assets/img/overview-02.png\"></a>
            <a href=\"https://supsystic.com/wordpress-plugins/?utm_source=plugin&utm_campaign=gallery\" target=\"_blank\"><img style=\"margin-top:20px;\"  class=\"overview-supsystic-img\" src=\"";
        // line 216
        echo Twig_SupTwgSgg_escape_filter($this->env, ($context["SGG_PLUGIN_URL"] ?? null), "html", null, true);
        echo "/src/GridGallery/Overview/assets/img/overview-03.png\"></a>
            <div class=\"clear\"></div>
        </div>
        </div>
    </div>";
    }

    public function getTemplateName()
    {
        return "@overview/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  318 => 216,  314 => 215,  309 => 214,  304 => 212,  302 => 211,  293 => 203,  285 => 200,  281 => 199,  278 => 198,  274 => 197,  231 => 156,  227 => 154,  181 => 111,  172 => 105,  159 => 94,  153 => 91,  143 => 84,  138 => 81,  133 => 78,  128 => 75,  123 => 72,  116 => 67,  110 => 64,  109 => 63,  107 => 61,  106 => 60,  104 => 58,  103 => 57,  101 => 55,  100 => 54,  94 => 50,  92 => 48,  58 => 16,  54 => 14,  51 => 13,  43 => 8,  36 => 6,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        //@trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_SupTwgSgg_Source("", "@overview/index.twig", "/var/www/html/wordpress/wp-content/plugins/gallery-by-supsystic/src/GridGallery/Overview/views/index.twig");
    }
}
