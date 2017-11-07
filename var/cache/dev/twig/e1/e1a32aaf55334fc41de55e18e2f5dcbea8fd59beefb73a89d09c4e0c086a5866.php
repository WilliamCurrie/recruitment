<?php

/* TwigBundle:Exception:exception.json.twig */
class __TwigTemplate_63428fe07a8535457f5c4ddbe78dfedc888ec2aed5629724fdaa1567a4a8fe7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b099e8af8c4ed33cd496ad2aed53c87a1c74a5fc8208dd9d308f9fbf4530e97c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b099e8af8c4ed33cd496ad2aed53c87a1c74a5fc8208dd9d308f9fbf4530e97c->enter($__internal_b099e8af8c4ed33cd496ad2aed53c87a1c74a5fc8208dd9d308f9fbf4530e97c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.json.twig"));

        $__internal_992fa0e22d40b14de4a3453a8b5baf624da465022ae57b8c5e0cb286ea7f4a7f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_992fa0e22d40b14de4a3453a8b5baf624da465022ae57b8c5e0cb286ea7f4a7f->enter($__internal_992fa0e22d40b14de4a3453a8b5baf624da465022ae57b8c5e0cb286ea7f4a7f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "exception" => $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_b099e8af8c4ed33cd496ad2aed53c87a1c74a5fc8208dd9d308f9fbf4530e97c->leave($__internal_b099e8af8c4ed33cd496ad2aed53c87a1c74a5fc8208dd9d308f9fbf4530e97c_prof);

        
        $__internal_992fa0e22d40b14de4a3453a8b5baf624da465022ae57b8c5e0cb286ea7f4a7f->leave($__internal_992fa0e22d40b14de4a3453a8b5baf624da465022ae57b8c5e0cb286ea7f4a7f_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{{ { 'error': { 'code': status_code, 'message': status_text, 'exception': exception.toarray } }|json_encode|raw }}
", "TwigBundle:Exception:exception.json.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception.json.twig");
    }
}
