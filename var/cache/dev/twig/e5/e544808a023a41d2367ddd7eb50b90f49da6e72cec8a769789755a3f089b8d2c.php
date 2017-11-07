<?php

/* @Framework/Form/password_widget.html.php */
class __TwigTemplate_eb28aa22dd221e7ed5ae630ec1536d5bfc2f2d24fcecb21b5eb1b9da430709be extends Twig_Template
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
        $__internal_8b15c3d253f2335ed1bba33a8fe201919557cb0c1155c64608e980de5aa3697b = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8b15c3d253f2335ed1bba33a8fe201919557cb0c1155c64608e980de5aa3697b->enter($__internal_8b15c3d253f2335ed1bba33a8fe201919557cb0c1155c64608e980de5aa3697b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/password_widget.html.php"));

        $__internal_4b6075656495cf6f363c2fe9ce9bccfdb9d79d8b91d602e5b6338502c6719309 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4b6075656495cf6f363c2fe9ce9bccfdb9d79d8b91d602e5b6338502c6719309->enter($__internal_4b6075656495cf6f363c2fe9ce9bccfdb9d79d8b91d602e5b6338502c6719309_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/password_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'password')) ?>
";
        
        $__internal_8b15c3d253f2335ed1bba33a8fe201919557cb0c1155c64608e980de5aa3697b->leave($__internal_8b15c3d253f2335ed1bba33a8fe201919557cb0c1155c64608e980de5aa3697b_prof);

        
        $__internal_4b6075656495cf6f363c2fe9ce9bccfdb9d79d8b91d602e5b6338502c6719309->leave($__internal_4b6075656495cf6f363c2fe9ce9bccfdb9d79d8b91d602e5b6338502c6719309_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/password_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'password')) ?>
", "@Framework/Form/password_widget.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/password_widget.html.php");
    }
}
