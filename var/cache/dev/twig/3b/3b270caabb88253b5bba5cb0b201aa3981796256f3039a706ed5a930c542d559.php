<?php

/* TwigBundle:Exception:exception.js.twig */
class __TwigTemplate_95f8f5ac2d04cd417af6e2914a72c13928c9e187b24cd511842739c08a2f5c77 extends Twig_Template
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
        $__internal_a0fe60c9db45fad99a22fd2d7d32be37a224688b37752dc382eeef3304cfebd5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a0fe60c9db45fad99a22fd2d7d32be37a224688b37752dc382eeef3304cfebd5->enter($__internal_a0fe60c9db45fad99a22fd2d7d32be37a224688b37752dc382eeef3304cfebd5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.js.twig"));

        $__internal_61cc924a7c3be6dd31f8e4a6932a29a0ecd6c224a3b46d04a9b86dd671cddc83 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_61cc924a7c3be6dd31f8e4a6932a29a0ecd6c224a3b46d04a9b86dd671cddc83->enter($__internal_61cc924a7c3be6dd31f8e4a6932a29a0ecd6c224a3b46d04a9b86dd671cddc83_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_include($this->env, $context, "@Twig/Exception/exception.txt.twig", array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception"))));
        echo "
*/
";
        
        $__internal_a0fe60c9db45fad99a22fd2d7d32be37a224688b37752dc382eeef3304cfebd5->leave($__internal_a0fe60c9db45fad99a22fd2d7d32be37a224688b37752dc382eeef3304cfebd5_prof);

        
        $__internal_61cc924a7c3be6dd31f8e4a6932a29a0ecd6c224a3b46d04a9b86dd671cddc83->leave($__internal_61cc924a7c3be6dd31f8e4a6932a29a0ecd6c224a3b46d04a9b86dd671cddc83_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 2,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("/*
{{ include('@Twig/Exception/exception.txt.twig', { exception: exception }) }}
*/
", "TwigBundle:Exception:exception.js.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception.js.twig");
    }
}
