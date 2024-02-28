<?php

/* grid-gallery.twig */
class __TwigTemplate_3769350dba2c1f11f6b0e316f65b9a8eb9a904d13eccfef8788844cc4df6d346 extends Twig_SupTwgSgg_Template
{
    public function __construct(Twig_SupTwgSgg_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'alerts' => array($this, 'block_alerts'),
            'header' => array($this, 'block_header'),
            'preview' => array($this, 'block_preview'),
            'content' => array($this, 'block_content'),
            'table' => array($this, 'block_table'),
            'notes' => array($this, 'block_notes'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"wraper\">";
        // line 9
        $this->displayBlock('alerts', $context, $blocks);
        // line 10
        echo "
    <div class=\"supsystic-plugin";
        // line 11
        if (($this->getAttribute(($context["pageOptions"] ?? null), "isSettingPage", array()) == 1)) {
            echo " sgg-setting-page";
        }
        echo "\">";
        // line 12
        $this->displayBlock('header', $context, $blocks);
        // line 17
        echo "        <section class=\"supsystic-content\">
            <nav class=\"supsystic-navigation\" style=\"top: 0px;\">
                <ul>
                    <li class=\"supsystic-sticky";
        // line 20
        if (($this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "module", array()) == "overview")) {
            echo " active";
        }
        echo "\">
                        <a href=\"";
        // line 21
        echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "overview"), "method"), "html", null, true);
        echo "\">
                            <i class=\"fa fa-info\"></i>
\t\t\t\t\t\t\t<span class=\"gg-sps-sticky-link\">";
        // line 23
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Overview")), "html", null, true);
        echo "</span>
                        </a>
                    </li>
                    <li";
        // line 26
        if ((($this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "module", array()) == "galleries") && ($this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "action", array()) == "showPresets"))) {
            echo " class=\"active\"";
        }
        echo ">
                        <a id=\"btn-add-new\" href=\"";
        // line 27
        echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries", 1 => "showPresets"), "method"), "html", null, true);
        echo "\">
                            <i class=\"fa fa-plus-circle\"></i>
\t\t\t\t\t\t\t<span class=\"gg-sps-sticky-link\">";
        // line 29
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("New Gallery")), "html", null, true);
        echo "</span>
                        </a>
                    </li>
                    <li class=\"supsystic-sticky";
        // line 32
        if (((($this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "module", array()) == "galleries") || (null === $this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "module", array()))) && ($this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "action", array()) != "showPresets"))) {
            echo " active";
        }
        echo "\">
                        <a href=\"";
        // line 33
        echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "galleries"), "method"), "html", null, true);
        echo "\">
                            <i class=\"fa fa-archive\"></i>
\t\t\t\t\t\t\t<span class=\"gg-sps-sticky-link\">";
        // line 35
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Galleries")), "html", null, true);
        echo "</span>
                        </a>
                    </li>
                    <li class=\"supsystic-sticky";
        // line 38
        if (($this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "module", array()) == "optimization")) {
            echo " active";
        }
        echo "\">
                        <a href=\"";
        // line 39
        echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "optimization"), "method"), "html", null, true);
        echo "\">
                            <i class=\"fa fa-compress\"></i>
\t\t\t\t\t\t\t<span class=\"gg-sps-sticky-link\">";
        // line 41
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Image Optimize")), "html", null, true);
        echo "</span>
                        </a>
                    </li>

                    <li class=\"supsystic-sticky";
        // line 45
        if (($this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "module", array()) == "settings")) {
            echo " active";
        }
        echo "\">
                        <a href=\"";
        // line 46
        echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "settings"), "method"), "html", null, true);
        echo "\">
                            <i class=\"fa fa-gear\"></i>
\t\t\t\t\t\t\t<span class=\"gg-sps-sticky-link\">";
        // line 48
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Advanced Settings")), "html", null, true);
        echo "</span>
                        </a>
                    </li>";
        // line 52
        if ($this->getAttribute(($context["environment"] ?? null), "getModule", array(0 => "license"), "method")) {
            // line 53
            echo "                        <li class=\"supsystic-sticky";
            if (($this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "module", array()) == "license")) {
                echo " active";
            }
            echo "\">
                            <a href=\"";
            // line 54
            echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute(($context["environment"] ?? null), "generateUrl", array(0 => "license"), "method"), "html", null, true);
            echo "\">
                                <i class=\"fa fa-hand-o-right\"></i>
\t\t\t\t\t\t\t\t<span class=\"gg-sps-sticky-link\">";
            // line 56
            echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("License")), "html", null, true);
            echo "</span>
                            </a>
                        </li>";
        }
        // line 60
        echo "
                </ul>
            </nav>
            <div class=\"supsystic-container supsystic-item supsystic-panel\"";
        // line 63
        if (($this->getAttribute($this->getAttribute(($context["request"] ?? null), "query", array()), "module", array()) == "galleries")) {
            echo "style=\"min-height: 500px\"";
        }
        echo ">";
        // line 64
        echo Twig_SupTwgSgg_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["environment"] ?? null), "getDispatcher", array(), "method"), "dispatch", array(0 => "messages"), "method"), "html", null, true);
        // line 65
        $this->displayBlock('preview', $context, $blocks);
        // line 66
        $this->displayBlock('content', $context, $blocks);
        // line 67
        echo "                <div class=\"clear\"></div>";
        // line 68
        $this->displayBlock('table', $context, $blocks);
        // line 69
        echo "                </form>";
        // line 71
        if ((($context["SGG_AC_SHOW"] ?? null) == true)) {
            // line 72
            echo "                <div class=\"supsysticOverviewACFormOverlay\">
                    <form method=\"post\" id=\"overview-ac-form\" class=\"supsysticOverviewACForm\">
                      <div class=\"supsysticOverviewACTitle\">
                        <div class=\"supsysticOverviewACClose\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></div>
                        <a href=\"https://supsystic.com/\" target=\"_blank\"><img src=\"";
            // line 76
            echo Twig_SupTwgSgg_escape_filter($this->env, ($context["SGG_PLUGIN_URL"] ?? null), "html", null, true);
            echo "/src/GridGallery/Overview/assets/img/supsystic-logo-small.png\"></a><br>
                        <b>PRO plugins</b> and <b>amazing gifts</b>!
                      </div>
                      <label>Name *</label>
                      <input type=\"text\" name=\"username\" value=\"";
            // line 80
            echo Twig_SupTwgSgg_escape_filter($this->env, ($context["SGG_USER_NAME"] ?? null), "html", null, true);
            echo "\">
                      <label>Email *</label>
                      <input type=\"text\" name=\"email\" value=\"";
            // line 82
            echo Twig_SupTwgSgg_escape_filter($this->env, ($context["SGG_USER_EMAIL"] ?? null), "html", null, true);
            echo "\">
                      <div class=\"supsysticOverviewACFormNotification\"><input required style=\"width:10px; margin-top:2px;\"type=\"checkbox\" id=\"supsysticOverviewACTermsCheckbox\" name=\"supsysticOverviewACTermsCheckbox\" value=\"\"><label for=\"supsysticOverviewACTermsCheckbox\"> I Accept the <a href=\"#terms\" class=\"supsysticOverviewACTerms\">Terms and Conditions</a> *</label></div>
                      <input type=\"hidden\" name=\"_wpnonce\" value=\"";
            // line 84
            echo Twig_SupTwgSgg_escape_filter($this->env, ($context["_wpnonce"] ?? null), "html", null, true);
            echo "\">
                      <button id=\"subscribe-btn\" type=\"submit\" class=\"button button-primary button-hero\">
                          <i class=\"fa fa-check-square\" aria-hidden=\"true\"></i>
                          Subscribe
                      </button>
                      <div class=\"button button-primary button-hero supsysticOverviewACBtn supsysticOverviewACBtnRemind\"><i class=\"fa fa-hourglass-half\" aria-hidden=\"true\"></i> Remind me tomorrow</div>
                      <div class=\"button button-primary button-hero supsysticOverviewACBtn supsysticOverviewACBtnDisable\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i> Do not disturb me again</div>
                      <div class=\"supsysticOverviewACFormNotification\" style=\"color: red; float: left;\" hidden>Fields with * are required to fill</div>
                    </form>
                    <div class=\"clear\"></div>
                    <div class=\"supsysticOverviewACFormOverlayTerms\">
                        <div class=\"supsysticOverviewACFormOverlayTermsClose\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i> Close</div>
                        <p><span >This Contact Form License Agreement (&quot;Agreement&quot;) is entered into by and between Supsystic Pty LTD, a company registered under the laws of Australia, hereinafter referred to as &quot;Licensor,&quot; and the user of the contact form, hereinafter referred to as &quot;Licensee.&quot;</span></p>
                        <p><span ><strong >1. Grant of License</strong></span></p>
                        <p><span >Subject to the terms and conditions of this Agreement, Licensor hereby grants Licensee a non-exclusive, non-transferable, and revocable license to use the contact form provided by Licensor for collecting the following data: email, name, site domain and plugin name fields data (&quot;Data&quot;).</span></p>
                        <p><span ><strong >2. Restrictions</strong></span></p>
                        <p><span >Licensee agrees to use the contact form for lawful and legitimate purposes only and shall not:</span></p>
                        <p><span >a. Use the contact form for any illegal or unauthorized purpose. b. Distribute or share the collected data without the consent of the data subjects. c. Modify, adapt, or reverse engineer the contact form or any of its components. d. Sell, sublicense, or distribute the contact form to third parties.</span></p>
                        <p><span ><strong >3. Data Privacy</strong></span></p>
                        <p><span >Licensor shall take reasonable measures to protect the collected data and shall not share, sell, or disclose the data to third parties without the explicit consent of Licensee.</span></p>
                        <p><span ><strong >4. Support and Updates</strong></span></p>
                        <p><span >Licensor may, at its discretion, provide support and updates for the contact form. Licensee is not entitled to automatic updates or support unless specified otherwise.</span></p>
                        <p><span ><strong >5. Termination</strong></span></p>
                        <p><span >This Agreement may be terminated by either party for any reason with written notice to the other party. Upon termination, Licensee shall cease using the contact form and remove it from their website.</span></p>
                        <p><span ><strong >6. Intellectual Property</strong></span></p>
                        <p><span >Licensor retains all rights, title, and interest in and to the contact form, including all related intellectual property rights.</span></p>
                        <p><span ><strong >7. Disclaimer of Warranty</strong></span></p>
                        <p><span >The contact form is provided &quot;as is&quot; without any warranty of any kind. Licensor disclaims all warranties, either express or implied, including, but not limited to, the implied warranties of merchantability and fitness for a particular purpose.</span></p>
                        <p><span ><strong >8. Limitation of Liability</strong></span></p>
                        <p><span >Licensor shall not be liable for any indirect, incidental, special, or consequential damages arising out of the use or inability to use the contact form.</span></p>
                        <p><span ><strong >9. Entire Agreement</strong></span></p>
                        <p><span >This Agreement constitutes the entire agreement between the parties concerning the subject matter hereof and supersedes all prior or contemporaneous agreements, understandings, and discussions.</span></p>
                        <p><span ><strong >10. Contact Information</strong></span></p>
                        <p><span >If you have any questions or concerns about this Agreement, please contact Supsystic Pty LTD at support@supsystic.com.</span></p>
                        <p><span ><strong >11. Acceptance</strong></span></p>
                        <p><span >By using the contact form, Licensee agrees to be bound by the terms and conditions of this Agreement.</span></p>
                    </div>
                </div>
                <div id=\"supsysticOverviewACFormDialog\" hidden>
                      <div class=\"on-error\" style=\"display:none\">
                          <p>";
            // line 124
            echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Some errors occurred while sending mail please send your message trough this contact form:")), "html", null, true);
            echo "</p>
                          <p><a href=\"https://supsystic.com/plugins/photo-gallery/#contact\" target=\"_blank\">https://supsystic.com/plugins/photo-gallery/#contact</a></p>
                      </div>
                      <div class=\"message\"></div>
                </div>";
        }
        // line 130
        echo "
            </div>

            <div class=\"supsystic-footer-wrapper\">
              <div class=\"supsystic-footer-add-review\">Add your <a target=\"_blank\" href=\"http://wordpress.org/support/view/plugin-reviews/gallery-by-supsystic?filter=5#postform\">★★★★★</a> on wordpress.org</div>
              <a href=\"https://supsystic.com/\" target=\"_blank\"><img src=\"";
        // line 135
        echo Twig_SupTwgSgg_escape_filter($this->env, ($context["SGG_PLUGIN_URL"] ?? null), "html", null, true);
        echo "/src/GridGallery/Overview/assets/img/supsystic-logo-small.png\"></a>
              <div class=\"supsystic-footer-plugin-version\">Photo Gallery by Supsystic Version:";
        // line 136
        echo " ";
        echo Twig_SupTwgSgg_escape_filter($this->env, ($context["SGG_PLUGIN_VERSION"] ?? null), "html", null, true);
        echo "</div>
            </div>
        </section>
    </div>

    <!-- Modal loading overlay -->
    <div class=\"gg-modal-loading-overlay\"></div>
    <div class=\"gg-modal-loading-object\">
        <p>
            <span id=\"loading-text\">Loading</span>
            <img src=\"";
        // line 146
        echo Twig_SupTwgSgg_escape_filter($this->env, ($this->getAttribute($this->getAttribute(($context["environment"] ?? null), "config", array()), "get", array(0 => "admin_url"), "method") . "/images/wpspin_light.gif"), "html", null, true);
        echo "\" alt=\"\"
                 title=\"";
        // line 147
        echo Twig_SupTwgSgg_escape_filter($this->env, call_user_func_array($this->env->getFunction('translate')->getCallable(), array("Loading")), "html", null, true);
        echo "\"/>
        </p>
    </div>";
        // line 151
        $this->displayBlock('notes', $context, $blocks);
        // line 152
        echo "</div>
";
    }

    // line 9
    public function block_alerts($context, array $blocks = array())
    {
    }

    // line 12
    public function block_header($context, array $blocks = array())
    {
        // line 13
        echo "            <div class=\"supsystic-breadcrumbs\">
                Photo Gallery by Supsystic
            </div>";
    }

    // line 65
    public function block_preview($context, array $blocks = array())
    {
    }

    // line 66
    public function block_content($context, array $blocks = array())
    {
    }

    // line 68
    public function block_table($context, array $blocks = array())
    {
    }

    // line 151
    public function block_notes($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "grid-gallery.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  317 => 151,  312 => 68,  307 => 66,  302 => 65,  296 => 13,  293 => 12,  288 => 9,  283 => 152,  281 => 151,  276 => 147,  272 => 146,  258 => 136,  254 => 135,  247 => 130,  239 => 124,  196 => 84,  191 => 82,  186 => 80,  179 => 76,  173 => 72,  171 => 71,  169 => 69,  167 => 68,  165 => 67,  163 => 66,  161 => 65,  159 => 64,  154 => 63,  149 => 60,  143 => 56,  138 => 54,  131 => 53,  129 => 52,  124 => 48,  119 => 46,  113 => 45,  106 => 41,  101 => 39,  95 => 38,  89 => 35,  84 => 33,  78 => 32,  72 => 29,  67 => 27,  61 => 26,  55 => 23,  50 => 21,  44 => 20,  39 => 17,  37 => 12,  32 => 11,  29 => 10,  27 => 9,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        //@trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_SupTwgSgg_Source("", "grid-gallery.twig", "/var/www/html/wordpress/wp-content/plugins/gallery-by-supsystic/app/templates/grid-gallery.twig");
    }
}
