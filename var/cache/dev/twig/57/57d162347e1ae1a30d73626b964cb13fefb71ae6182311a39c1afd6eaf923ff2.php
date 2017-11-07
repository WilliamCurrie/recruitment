<?php

/* TwigBundle:Exception:error.rdf.twig */
class __TwigTemplate_1babac52968fb43dd8594519c98a8759092d1726d1bc32e920a1cd63a34dcea8 extends Twig_Template
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
        $__internal_aa90790e43d70895a1132b612ab46c7e3db142e9d5bbd64b5523a4b536000671 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_aa90790e43d70895a1132b612ab46c7e3db142e9d5bbd64b5523a4b536000671->enter($__internal_aa90790e43d70895a1132b612ab46c7e3db142e9d5bbd64b5523a4b536000671_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.rdf.twig"));

        $__internal_4fb34d226cde6622bf17bf71f51cf992422b81e9a17889ed6265606d88068659 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4fb34d226cde6622bf17bf71f51cf992422b81e9a17889ed6265606d88068659->enter($__internal_4fb34d226cde6622bf17bf71f51cf992422b81e9a17889ed6265606d88068659_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.rdf.twig"));

        // line 1
        echo twig_include($this->env, $context, "@Twig/Exception/error.xml.twig");
        echo "
";
        
        $__internal_aa90790e43d70895a1132b612ab46c7e3db142e9d5bbd64b5523a4b536000671->leave($__internal_aa90790e43d70895a1132b612ab46c7e3db142e9d5bbd64b5523a4b536000671_prof);

        
        $__internal_4fb34d226cde6622bf17bf71f51cf992422b81e9a17889ed6265606d88068659->leave($__internal_4fb34d226cde6622bf17bf71f51cf992422b81e9a17889ed6265606d88068659_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.rdf.twig";
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
        return new Twig_Source("{{ include('@Twig/Exception/error.xml.twig') }}
", "TwigBundle:Exception:error.rdf.twig", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/error.rdf.twig");
    }
}
