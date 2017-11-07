<?php

/* WebProfilerBundle:Profiler:toolbar_redirect.html.twig */
class __TwigTemplate_d55969e6d0bb87342fcf80815e243d99d37bd5f1a2552cfbeee955bb82ad3dc5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_67d796f83d051ef4ef75b419ce2459651449ecf8d47a1dd0f91fce9da52acc21 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_67d796f83d051ef4ef75b419ce2459651449ecf8d47a1dd0f91fce9da52acc21->enter($__internal_67d796f83d051ef4ef75b419ce2459651449ecf8d47a1dd0f91fce9da52acc21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig"));

        $__internal_934c738f79d50d1b41b4f1354443a69331e96ede700cca1068f66b2d656bf493 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_934c738f79d50d1b41b4f1354443a69331e96ede700cca1068f66b2d656bf493->enter($__internal_934c738f79d50d1b41b4f1354443a69331e96ede700cca1068f66b2d656bf493_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_67d796f83d051ef4ef75b419ce2459651449ecf8d47a1dd0f91fce9da52acc21->leave($__internal_67d796f83d051ef4ef75b419ce2459651449ecf8d47a1dd0f91fce9da52acc21_prof);

        
        $__internal_934c738f79d50d1b41b4f1354443a69331e96ede700cca1068f66b2d656bf493->leave($__internal_934c738f79d50d1b41b4f1354443a69331e96ede700cca1068f66b2d656bf493_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_b68a4e79944166fccb657b25ae5ab975444ec5872ebb4bbcd2800be4bc02ec8e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b68a4e79944166fccb657b25ae5ab975444ec5872ebb4bbcd2800be4bc02ec8e->enter($__internal_b68a4e79944166fccb657b25ae5ab975444ec5872ebb4bbcd2800be4bc02ec8e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_7ba6757081e363cea0beb4b8e5f61d0f19a6e147ac998afb1a1897f9c11e6eaf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7ba6757081e363cea0beb4b8e5f61d0f19a6e147ac998afb1a1897f9c11e6eaf->enter($__internal_7ba6757081e363cea0beb4b8e5f61d0f19a6e147ac998afb1a1897f9c11e6eaf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Redirection Intercepted";
        
        $__internal_7ba6757081e363cea0beb4b8e5f61d0f19a6e147ac998afb1a1897f9c11e6eaf->leave($__internal_7ba6757081e363cea0beb4b8e5f61d0f19a6e147ac998afb1a1897f9c11e6eaf_prof);

        
        $__internal_b68a4e79944166fccb657b25ae5ab975444ec5872ebb4bbcd2800be4bc02ec8e->leave($__internal_b68a4e79944166fccb657b25ae5ab975444ec5872ebb4bbcd2800be4bc02ec8e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_087b64f1609f5c50a58771d02a07d214f450d8eb741a47aaeae0659f3fcffc51 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_087b64f1609f5c50a58771d02a07d214f450d8eb741a47aaeae0659f3fcffc51->enter($__internal_087b64f1609f5c50a58771d02a07d214f450d8eb741a47aaeae0659f3fcffc51_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_3da8287ba1ed59250e7124f91550c4637230ff7f1879c539519a6a6caeea3236 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3da8287ba1ed59250e7124f91550c4637230ff7f1879c539519a6a6caeea3236->enter($__internal_3da8287ba1ed59250e7124f91550c4637230ff7f1879c539519a6a6caeea3236_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class=\"sf-reset\">
        <div class=\"block-exception\">
            <h1>This request redirects to <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
";
        
        $__internal_3da8287ba1ed59250e7124f91550c4637230ff7f1879c539519a6a6caeea3236->leave($__internal_3da8287ba1ed59250e7124f91550c4637230ff7f1879c539519a6a6caeea3236_prof);

        
        $__internal_087b64f1609f5c50a58771d02a07d214f450d8eb741a47aaeae0659f3fcffc51->leave($__internal_087b64f1609f5c50a58771d02a07d214f450d8eb741a47aaeae0659f3fcffc51_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 8,  68 => 6,  59 => 5,  41 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block title 'Redirection Intercepted' %}

{% block body %}
    <div class=\"sf-reset\">
        <div class=\"block-exception\">
            <h1>This request redirects to <a href=\"{{ location }}\">{{ location }}</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
{% endblock %}
", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Profiler/toolbar_redirect.html.twig");
    }
}
