<?php

/* WebProfilerBundle:Profiler:info.html.twig */
class __TwigTemplate_92f342d2a1f100edb0d7c9bdf99d52b1167416a2f2d35449db45f24f35cdc14e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "WebProfilerBundle:Profiler:info.html.twig", 1);
        $this->blocks = array(
            'summary' => array($this, 'block_summary'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d455fd3d254bdaa327491f496f613748c876368e4ac8e760dcdae7a3202bf524 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d455fd3d254bdaa327491f496f613748c876368e4ac8e760dcdae7a3202bf524->enter($__internal_d455fd3d254bdaa327491f496f613748c876368e4ac8e760dcdae7a3202bf524_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:info.html.twig"));

        $__internal_810b16222cd6c2d513c246da373b3b13ffbc4fd56a0abeb30303d631c8f568c1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_810b16222cd6c2d513c246da373b3b13ffbc4fd56a0abeb30303d631c8f568c1->enter($__internal_810b16222cd6c2d513c246da373b3b13ffbc4fd56a0abeb30303d631c8f568c1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:info.html.twig"));

        // line 3
        $context["messages"] = array("no_token" => array("status" => "error", "title" => (((((        // line 6
array_key_exists("token", $context)) ? (_twig_default_filter((isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "")) : ("")) == "latest")) ? ("There are no profiles") : ("Token not found")), "message" => (((((        // line 7
array_key_exists("token", $context)) ? (_twig_default_filter((isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "")) : ("")) == "latest")) ? ("No profiles found in the database.") : ((("Token \"" . ((array_key_exists("token", $context)) ? (_twig_default_filter((isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "")) : (""))) . "\" was not found in the database.")))));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d455fd3d254bdaa327491f496f613748c876368e4ac8e760dcdae7a3202bf524->leave($__internal_d455fd3d254bdaa327491f496f613748c876368e4ac8e760dcdae7a3202bf524_prof);

        
        $__internal_810b16222cd6c2d513c246da373b3b13ffbc4fd56a0abeb30303d631c8f568c1->leave($__internal_810b16222cd6c2d513c246da373b3b13ffbc4fd56a0abeb30303d631c8f568c1_prof);

    }

    // line 11
    public function block_summary($context, array $blocks = array())
    {
        $__internal_74bb8815d661db63f0d4681b37ba8b8a4f4b28277611e82c3bf6852a41e0fea8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_74bb8815d661db63f0d4681b37ba8b8a4f4b28277611e82c3bf6852a41e0fea8->enter($__internal_74bb8815d661db63f0d4681b37ba8b8a4f4b28277611e82c3bf6852a41e0fea8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "summary"));

        $__internal_886be7a78f70a172ba48655d636a2ab05255156a69fb0cd6f53dcd15bc49eef6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_886be7a78f70a172ba48655d636a2ab05255156a69fb0cd6f53dcd15bc49eef6->enter($__internal_886be7a78f70a172ba48655d636a2ab05255156a69fb0cd6f53dcd15bc49eef6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "summary"));

        // line 12
        echo "    <div class=\"status status-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")), (isset($context["about"]) ? $context["about"] : $this->getContext($context, "about")), array(), "array"), "status", array()), "html", null, true);
        echo "\">
        <div class=\"container\">
            <h2>";
        // line 14
        echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")), (isset($context["about"]) ? $context["about"] : $this->getContext($context, "about")), array(), "array"), "status", array())), "html", null, true);
        echo "</h2>
        </div>
    </div>
";
        
        $__internal_886be7a78f70a172ba48655d636a2ab05255156a69fb0cd6f53dcd15bc49eef6->leave($__internal_886be7a78f70a172ba48655d636a2ab05255156a69fb0cd6f53dcd15bc49eef6_prof);

        
        $__internal_74bb8815d661db63f0d4681b37ba8b8a4f4b28277611e82c3bf6852a41e0fea8->leave($__internal_74bb8815d661db63f0d4681b37ba8b8a4f4b28277611e82c3bf6852a41e0fea8_prof);

    }

    // line 19
    public function block_panel($context, array $blocks = array())
    {
        $__internal_996196d0d46903866e402441e0b043baddad9413630b314056167d380da63ca8 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_996196d0d46903866e402441e0b043baddad9413630b314056167d380da63ca8->enter($__internal_996196d0d46903866e402441e0b043baddad9413630b314056167d380da63ca8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_2aa965f615e01a9c55e9e846a00a2715f7a06d63749473141b161048ec8ec028 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2aa965f615e01a9c55e9e846a00a2715f7a06d63749473141b161048ec8ec028->enter($__internal_2aa965f615e01a9c55e9e846a00a2715f7a06d63749473141b161048ec8ec028_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 20
        echo "    <h2>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")), (isset($context["about"]) ? $context["about"] : $this->getContext($context, "about")), array(), "array"), "title", array()), "html", null, true);
        echo "</h2>
    <p>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")), (isset($context["about"]) ? $context["about"] : $this->getContext($context, "about")), array(), "array"), "message", array()), "html", null, true);
        echo "</p>
";
        
        $__internal_2aa965f615e01a9c55e9e846a00a2715f7a06d63749473141b161048ec8ec028->leave($__internal_2aa965f615e01a9c55e9e846a00a2715f7a06d63749473141b161048ec8ec028_prof);

        
        $__internal_996196d0d46903866e402441e0b043baddad9413630b314056167d380da63ca8->leave($__internal_996196d0d46903866e402441e0b043baddad9413630b314056167d380da63ca8_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 21,  84 => 20,  75 => 19,  61 => 14,  55 => 12,  46 => 11,  36 => 1,  34 => 7,  33 => 6,  32 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% set messages = {
    'no_token' : {
        status:  'error',
        title:   (token|default('') == 'latest') ? 'There are no profiles' : 'Token not found',
        message: (token|default('') == 'latest') ? 'No profiles found in the database.' : 'Token \"' ~ token|default('') ~ '\" was not found in the database.'
    }
} %}

{% block summary %}
    <div class=\"status status-{{ messages[about].status }}\">
        <div class=\"container\">
            <h2>{{ messages[about].status|title }}</h2>
        </div>
    </div>
{% endblock %}

{% block panel %}
    <h2>{{ messages[about].title }}</h2>
    <p>{{ messages[about].message }}</p>
{% endblock %}
", "WebProfilerBundle:Profiler:info.html.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Profiler/info.html.twig");
    }
}
