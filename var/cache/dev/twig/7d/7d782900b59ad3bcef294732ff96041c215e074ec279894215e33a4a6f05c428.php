<?php

/* @Twig/layout.html.twig */
class __TwigTemplate_66e7e75ec9c0010641dbe585aeeac70571ef1f0833e1a7882f58c23aa7e6cdbc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_69336c58ca3bbf8e8a1496d2ce0d20650be97097f7513df4c81152789f577a87 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_69336c58ca3bbf8e8a1496d2ce0d20650be97097f7513df4c81152789f577a87->enter($__internal_69336c58ca3bbf8e8a1496d2ce0d20650be97097f7513df4c81152789f577a87_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        $__internal_27c0de50f04670e71cafb5bc82c59adf107feb4b6e90e4cdc03ffcd8c4b37701 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_27c0de50f04670e71cafb5bc82c59adf107feb4b6e90e4cdc03ffcd8c4b37701->enter($__internal_27c0de50f04670e71cafb5bc82c59adf107feb4b6e90e4cdc03ffcd8c4b37701_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 8
        echo twig_include($this->env, $context, "@Twig/images/favicon.png.base64");
        echo "\">
        <style>";
        // line 9
        echo twig_include($this->env, $context, "@Twig/exception.css.twig");
        echo "</style>
        ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">";
        // line 15
        echo twig_include($this->env, $context, "@Twig/images/symfony-logo.svg");
        echo " Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">";
        // line 19
        echo twig_include($this->env, $context, "@Twig/images/icon-book.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">";
        // line 26
        echo twig_include($this->env, $context, "@Twig/images/icon-support.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        ";
        // line 33
        $this->displayBlock('body', $context, $blocks);
        // line 34
        echo "        ";
        echo twig_include($this->env, $context, "@Twig/base_js.html.twig");
        echo "
    </body>
</html>
";
        
        $__internal_69336c58ca3bbf8e8a1496d2ce0d20650be97097f7513df4c81152789f577a87->leave($__internal_69336c58ca3bbf8e8a1496d2ce0d20650be97097f7513df4c81152789f577a87_prof);

        
        $__internal_27c0de50f04670e71cafb5bc82c59adf107feb4b6e90e4cdc03ffcd8c4b37701->leave($__internal_27c0de50f04670e71cafb5bc82c59adf107feb4b6e90e4cdc03ffcd8c4b37701_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_8b54827a8974c8382b10d825cb733990f6e8d5a5d0dc13e7075677706e24df5a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8b54827a8974c8382b10d825cb733990f6e8d5a5d0dc13e7075677706e24df5a->enter($__internal_8b54827a8974c8382b10d825cb733990f6e8d5a5d0dc13e7075677706e24df5a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_e3a702db5a87e62c194294a73eae874be50faae1a6ffced49ff24b5ec484c278 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e3a702db5a87e62c194294a73eae874be50faae1a6ffced49ff24b5ec484c278->enter($__internal_e3a702db5a87e62c194294a73eae874be50faae1a6ffced49ff24b5ec484c278_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_e3a702db5a87e62c194294a73eae874be50faae1a6ffced49ff24b5ec484c278->leave($__internal_e3a702db5a87e62c194294a73eae874be50faae1a6ffced49ff24b5ec484c278_prof);

        
        $__internal_8b54827a8974c8382b10d825cb733990f6e8d5a5d0dc13e7075677706e24df5a->leave($__internal_8b54827a8974c8382b10d825cb733990f6e8d5a5d0dc13e7075677706e24df5a_prof);

    }

    // line 10
    public function block_head($context, array $blocks = array())
    {
        $__internal_3ce2bc25bfcbc8cf3d84702efd6eba1da5b64fcefe0cf5c12fb1f3eecd300f9a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3ce2bc25bfcbc8cf3d84702efd6eba1da5b64fcefe0cf5c12fb1f3eecd300f9a->enter($__internal_3ce2bc25bfcbc8cf3d84702efd6eba1da5b64fcefe0cf5c12fb1f3eecd300f9a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_04f3a3f4315e7598d0bf5c102fc04eeb880a8e9f0002365f2939d7d9693a5f72 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_04f3a3f4315e7598d0bf5c102fc04eeb880a8e9f0002365f2939d7d9693a5f72->enter($__internal_04f3a3f4315e7598d0bf5c102fc04eeb880a8e9f0002365f2939d7d9693a5f72_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        
        $__internal_04f3a3f4315e7598d0bf5c102fc04eeb880a8e9f0002365f2939d7d9693a5f72->leave($__internal_04f3a3f4315e7598d0bf5c102fc04eeb880a8e9f0002365f2939d7d9693a5f72_prof);

        
        $__internal_3ce2bc25bfcbc8cf3d84702efd6eba1da5b64fcefe0cf5c12fb1f3eecd300f9a->leave($__internal_3ce2bc25bfcbc8cf3d84702efd6eba1da5b64fcefe0cf5c12fb1f3eecd300f9a_prof);

    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        $__internal_8168d8acb961ed0f0a9ebfb934a8291d477e38a8d35568cc0e75ab5fc6fe567e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8168d8acb961ed0f0a9ebfb934a8291d477e38a8d35568cc0e75ab5fc6fe567e->enter($__internal_8168d8acb961ed0f0a9ebfb934a8291d477e38a8d35568cc0e75ab5fc6fe567e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_7697fed885d2344658e6e132b0332e9597ca424ad9602b8fc4d4acddb5471df0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7697fed885d2344658e6e132b0332e9597ca424ad9602b8fc4d4acddb5471df0->enter($__internal_7697fed885d2344658e6e132b0332e9597ca424ad9602b8fc4d4acddb5471df0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_7697fed885d2344658e6e132b0332e9597ca424ad9602b8fc4d4acddb5471df0->leave($__internal_7697fed885d2344658e6e132b0332e9597ca424ad9602b8fc4d4acddb5471df0_prof);

        
        $__internal_8168d8acb961ed0f0a9ebfb934a8291d477e38a8d35568cc0e75ab5fc6fe567e->leave($__internal_8168d8acb961ed0f0a9ebfb934a8291d477e38a8d35568cc0e75ab5fc6fe567e_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 33,  120 => 10,  103 => 7,  88 => 34,  86 => 33,  76 => 26,  66 => 19,  59 => 15,  53 => 11,  51 => 10,  47 => 9,  43 => 8,  39 => 7,  33 => 4,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"{{ _charset }}\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>{% block title %}{% endblock %}</title>
        <link rel=\"icon\" type=\"image/png\" href=\"{{ include('@Twig/images/favicon.png.base64') }}\">
        <style>{{ include('@Twig/exception.css.twig') }}</style>
        {% block head %}{% endblock %}
    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">{{ include('@Twig/images/symfony-logo.svg') }} Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-book.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-support.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        {% block body %}{% endblock %}
        {{ include('@Twig/base_js.html.twig') }}
    </body>
</html>
", "@Twig/layout.html.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/layout.html.twig");
    }
}
