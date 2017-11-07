<?php

/* TwigBundle:Exception:exception.atom.twig */
class __TwigTemplate_bd1fc7b3fabd538759b30c9d2c371a08aab40d4c2b76808f84b16773da70163b extends Twig_Template
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
        $__internal_8969f91a4d9ac5671dae69daefccf749efc71db9a9c43a8c60ac93718264a099 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8969f91a4d9ac5671dae69daefccf749efc71db9a9c43a8c60ac93718264a099->enter($__internal_8969f91a4d9ac5671dae69daefccf749efc71db9a9c43a8c60ac93718264a099_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.atom.twig"));

        $__internal_7c4e5f42583bee7f6be4c65578be896612a4d669c606706c3c32fd34ba5bfdc8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7c4e5f42583bee7f6be4c65578be896612a4d669c606706c3c32fd34ba5bfdc8->enter($__internal_7c4e5f42583bee7f6be4c65578be896612a4d669c606706c3c32fd34ba5bfdc8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.atom.twig"));

        // line 1
        echo twig_include($this->env, $context, "@Twig/Exception/exception.xml.twig", array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception"))));
        echo "
";
        
        $__internal_8969f91a4d9ac5671dae69daefccf749efc71db9a9c43a8c60ac93718264a099->leave($__internal_8969f91a4d9ac5671dae69daefccf749efc71db9a9c43a8c60ac93718264a099_prof);

        
        $__internal_7c4e5f42583bee7f6be4c65578be896612a4d669c606706c3c32fd34ba5bfdc8->leave($__internal_7c4e5f42583bee7f6be4c65578be896612a4d669c606706c3c32fd34ba5bfdc8_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.atom.twig";
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
        return new Twig_Source("{{ include('@Twig/Exception/exception.xml.twig', { exception: exception }) }}
", "TwigBundle:Exception:exception.atom.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception.atom.twig");
    }
}
