<?php

/* @Framework/Form/container_attributes.html.php */
class __TwigTemplate_a9d39dd2e4992fe9825fd11c3a6b42aa3e3342977b90acc6d483f30dfbfae0f3 extends Twig_Template
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
        $__internal_f975e5b07502ea7740baf98c7fe1f4b900bfde01281bd1e48f6d57c68f7f26db = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f975e5b07502ea7740baf98c7fe1f4b900bfde01281bd1e48f6d57c68f7f26db->enter($__internal_f975e5b07502ea7740baf98c7fe1f4b900bfde01281bd1e48f6d57c68f7f26db_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/container_attributes.html.php"));

        $__internal_f93d2ab821208d9e1ec2de386669329ebc08c8dd27db63512f71e7622e0c1bb4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f93d2ab821208d9e1ec2de386669329ebc08c8dd27db63512f71e7622e0c1bb4->enter($__internal_f93d2ab821208d9e1ec2de386669329ebc08c8dd27db63512f71e7622e0c1bb4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/container_attributes.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>
";
        
        $__internal_f975e5b07502ea7740baf98c7fe1f4b900bfde01281bd1e48f6d57c68f7f26db->leave($__internal_f975e5b07502ea7740baf98c7fe1f4b900bfde01281bd1e48f6d57c68f7f26db_prof);

        
        $__internal_f93d2ab821208d9e1ec2de386669329ebc08c8dd27db63512f71e7622e0c1bb4->leave($__internal_f93d2ab821208d9e1ec2de386669329ebc08c8dd27db63512f71e7622e0c1bb4_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/container_attributes.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>
", "@Framework/Form/container_attributes.html.php", "/home/walkyria/Documents/tests/recruitment/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/container_attributes.html.php");
    }
}
