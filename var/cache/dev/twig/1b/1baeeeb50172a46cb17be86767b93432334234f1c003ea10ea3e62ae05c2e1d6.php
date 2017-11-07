<?php

/* WebProfilerBundle:Profiler:open.html.twig */
class __TwigTemplate_5866c30bc1b3059cec63bd146cb18dab71ea4b764239e4c1668ef511d8d88cfb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/base.html.twig", "WebProfilerBundle:Profiler:open.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_50645fc4c8e97c1d1a49599778b344e1e2280af86cd462fa080646b2bf781562 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_50645fc4c8e97c1d1a49599778b344e1e2280af86cd462fa080646b2bf781562->enter($__internal_50645fc4c8e97c1d1a49599778b344e1e2280af86cd462fa080646b2bf781562_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:open.html.twig"));

        $__internal_fc5bf9f522ed006803f87489809af8179f316a87a47ea206bcdb62e332335ecd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_fc5bf9f522ed006803f87489809af8179f316a87a47ea206bcdb62e332335ecd->enter($__internal_fc5bf9f522ed006803f87489809af8179f316a87a47ea206bcdb62e332335ecd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:open.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_50645fc4c8e97c1d1a49599778b344e1e2280af86cd462fa080646b2bf781562->leave($__internal_50645fc4c8e97c1d1a49599778b344e1e2280af86cd462fa080646b2bf781562_prof);

        
        $__internal_fc5bf9f522ed006803f87489809af8179f316a87a47ea206bcdb62e332335ecd->leave($__internal_fc5bf9f522ed006803f87489809af8179f316a87a47ea206bcdb62e332335ecd_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_de8e170cfd662f342bf34bca56ea605a9218ec731e14d568165a1c039212bec3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_de8e170cfd662f342bf34bca56ea605a9218ec731e14d568165a1c039212bec3->enter($__internal_de8e170cfd662f342bf34bca56ea605a9218ec731e14d568165a1c039212bec3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_10a1eec169613d1b1022c76d6c3d5ea3596b4874f85b5d98cea02c61d6920353 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_10a1eec169613d1b1022c76d6c3d5ea3596b4874f85b5d98cea02c61d6920353->enter($__internal_10a1eec169613d1b1022c76d6c3d5ea3596b4874f85b5d98cea02c61d6920353_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <style>
        ";
        // line 5
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/open.css.twig");
        echo "
    </style>
";
        
        $__internal_10a1eec169613d1b1022c76d6c3d5ea3596b4874f85b5d98cea02c61d6920353->leave($__internal_10a1eec169613d1b1022c76d6c3d5ea3596b4874f85b5d98cea02c61d6920353_prof);

        
        $__internal_de8e170cfd662f342bf34bca56ea605a9218ec731e14d568165a1c039212bec3->leave($__internal_de8e170cfd662f342bf34bca56ea605a9218ec731e14d568165a1c039212bec3_prof);

    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        $__internal_20c13a980cd2f4fbdb25354e2d1782e383e0edc2486a91c7ce49f36e430c4a14 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_20c13a980cd2f4fbdb25354e2d1782e383e0edc2486a91c7ce49f36e430c4a14->enter($__internal_20c13a980cd2f4fbdb25354e2d1782e383e0edc2486a91c7ce49f36e430c4a14_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_031a008434afa7d38d371374f993dfbed1f708c2da5a8cde81083fbb55d5f71b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_031a008434afa7d38d371374f993dfbed1f708c2da5a8cde81083fbb55d5f71b->enter($__internal_031a008434afa7d38d371374f993dfbed1f708c2da5a8cde81083fbb55d5f71b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 10
        echo "<div class=\"header\">
    <h1>";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["file"]) ? $context["file"] : $this->getContext($context, "file")), "html", null, true);
        echo " <small>line ";
        echo twig_escape_filter($this->env, (isset($context["line"]) ? $context["line"] : $this->getContext($context, "line")), "html", null, true);
        echo "</small></h1>
    <a class=\"doc\" href=\"https://symfony.com/doc/";
        // line 12
        echo twig_escape_filter($this->env, twig_constant("Symfony\\Component\\HttpKernel\\Kernel::VERSION"), "html", null, true);
        echo "/reference/configuration/framework.html#ide\" rel=\"help\">Open in your IDE?</a>
</div>
<div class=\"source\">
    ";
        // line 15
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\CodeExtension')->fileExcerpt((isset($context["filename"]) ? $context["filename"] : $this->getContext($context, "filename")), (isset($context["line"]) ? $context["line"] : $this->getContext($context, "line")),  -1);
        echo "
</div>
";
        
        $__internal_031a008434afa7d38d371374f993dfbed1f708c2da5a8cde81083fbb55d5f71b->leave($__internal_031a008434afa7d38d371374f993dfbed1f708c2da5a8cde81083fbb55d5f71b_prof);

        
        $__internal_20c13a980cd2f4fbdb25354e2d1782e383e0edc2486a91c7ce49f36e430c4a14->leave($__internal_20c13a980cd2f4fbdb25354e2d1782e383e0edc2486a91c7ce49f36e430c4a14_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:open.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 15,  84 => 12,  78 => 11,  75 => 10,  66 => 9,  53 => 5,  50 => 4,  41 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/base.html.twig' %}

{% block head %}
    <style>
        {{ include('@WebProfiler/Profiler/open.css.twig') }}
    </style>
{% endblock %}

{% block body %}
<div class=\"header\">
    <h1>{{ file }} <small>line {{ line }}</small></h1>
    <a class=\"doc\" href=\"https://symfony.com/doc/{{ constant('Symfony\\\\Component\\\\HttpKernel\\\\Kernel::VERSION') }}/reference/configuration/framework.html#ide\" rel=\"help\">Open in your IDE?</a>
</div>
<div class=\"source\">
    {{ filename|file_excerpt(line, -1) }}
</div>
{% endblock %}
", "WebProfilerBundle:Profiler:open.html.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Profiler/open.html.twig");
    }
}
