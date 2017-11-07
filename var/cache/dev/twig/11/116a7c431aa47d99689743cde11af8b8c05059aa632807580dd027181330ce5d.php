<?php

/* TwigBundle:Exception:exception.rdf.twig */
class __TwigTemplate_ec060f0c4a7de30cd6d80af9ff400491d9bc25f588142eaa55885b230cdf325b extends Twig_Template
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
        $__internal_fd0734637ed7f5bf9bb2d3e65d1ae5004f6c2c4cd590f7a87dcf14c2cd96a2d7 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fd0734637ed7f5bf9bb2d3e65d1ae5004f6c2c4cd590f7a87dcf14c2cd96a2d7->enter($__internal_fd0734637ed7f5bf9bb2d3e65d1ae5004f6c2c4cd590f7a87dcf14c2cd96a2d7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.rdf.twig"));

        $__internal_97b285282937d235c81160ad8ea6e648cd59001b2c3e6dbec59e2b30a2c39c1b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_97b285282937d235c81160ad8ea6e648cd59001b2c3e6dbec59e2b30a2c39c1b->enter($__internal_97b285282937d235c81160ad8ea6e648cd59001b2c3e6dbec59e2b30a2c39c1b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.rdf.twig"));

        // line 1
        echo twig_include($this->env, $context, "@Twig/Exception/exception.xml.twig", array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception"))));
        echo "
";
        
        $__internal_fd0734637ed7f5bf9bb2d3e65d1ae5004f6c2c4cd590f7a87dcf14c2cd96a2d7->leave($__internal_fd0734637ed7f5bf9bb2d3e65d1ae5004f6c2c4cd590f7a87dcf14c2cd96a2d7_prof);

        
        $__internal_97b285282937d235c81160ad8ea6e648cd59001b2c3e6dbec59e2b30a2c39c1b->leave($__internal_97b285282937d235c81160ad8ea6e648cd59001b2c3e6dbec59e2b30a2c39c1b_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.rdf.twig";
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
", "TwigBundle:Exception:exception.rdf.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception.rdf.twig");
    }
}
